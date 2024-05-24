<?php
if (!defined('ROOT_URL')) {
    die;
}

$userMgr = new UserManager();
$orderMgr = new OrderManager();
$cm = new CartManager();

if (isset($_SESSION['users']) && !empty($_SESSION['users'])) {
    $userID = $_SESSION['users']->id;
    $user = $userMgr->get($userID);
    $detailsMgr = new UserDetailsManager();
    $details = $detailsMgr->getDetails($userID);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assicurati che tutti i campi obbligatori siano stati forniti
    $required_fields = ['name', 'address', 'phone'];
    $missing_fields = [];
    $errorMsg = '';
    foreach ($required_fields as $field) {
        if (!isset($_POST[$field]) || empty($_POST[$field])) {
            $missing_fields[] = $field;
        }
    }

    // Se ci sono campi mancanti, gestisci l'errore
    if (!empty($missing_fields)) {
        // Gestisci l'errore, ad esempio restituendo un messaggio all'utente
        $errorMsg = "I seguenti campi sono obbligatori: " . implode(', ', $missing_fields);
    } else {

        // Ottieni l'ID del carrello
        $cartID = $cm->getCartID();
        $query = $cm->getCartTotal($cartID);
        $cart_total = $query['total'];

        // Creazione dell'ordine
        $order_data = [
            'name' => $_POST['name'],
            'address' => $_POST['address'],
            'phone' => $_POST['phone'],
            'total_amount' => $cart_total,
            'note' => isset($_POST['note']) ? $_POST['note'] : '',
            'cart_id' => $cartID,
            'created_at' => date('Y-m-d H:i:s')
        ];

        // Se l'utente è loggato, aggiungi anche l'ID dell'utente
        if (isset($_SESSION['users']) && !empty($_SESSION['users'])) {
            $userID = $_SESSION['users']->id;
            $order_data['user_id'] = $userID;
        }

        // Creazione dell'ordine
        $orderMgr->create((object)$order_data);

        // Se l'utente è loggato e i dettagli non esistono, crea i dettagli dell'utente
        if (isset($_SESSION['users']) && !empty($_SESSION['users']) && $details == null) {
            $detailsMgr->create((object)[
                'name' => $_POST['name'],
                'address' => $_POST['address'],
                'phone' => $_POST['phone'],
                'user_id' => $userID
            ]);
        }

        $cm->startNewClientSession();
        // header("Location: ../public/?page=homepage&message=Acquisto effettuato con successo");
        echo "<script>window.location.href = '../public/?page=homepage&message=Acquisto+effettuato+con+successo';</script>";
        exit();
    }
}
?>

<div class="card mb-3">
    <div class="card-header fw-bolder fs-3 text-center">CHECKOUT</div>
    <div class="card-body">
        <h5 class="card-title">Inserisci i tuoi dati</h5>
        <form method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input name="name" required type="text" value="<?= isset($details['name']) ? htmlspecialchars($details['name']) : '' ?>" class="form-control" id="name" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input name="email" type="email" class="form-control" value="<?= isset($user->email) ? $user->email : '' ?>" id="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Indirizzo</label>
                <input name="address" value="<?= isset($details['address']) ? htmlspecialchars($details['address']) : '' ?>" required type="text" class="form-control" id="address">
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Telefono</label>
                <input name="phone" value="<?= isset($details['phone']) ? htmlspecialchars($details['phone']) : '' ?>" required type="tel" class="form-control" id="phone">
            </div>

            <div class="mb-3">
                <label for="note" class="form-label">Note</label>
                <textarea class="form-control" name="note" id="note" rows="3"></textarea>
            </div>

            <?php if (isset($errorMsg) && $errorMsg != '') { ?>
                <div class="alert alert-danger my-2">
                    <?= $errorMsg ?>
                </div>
            <?php } ?>

            <button <?= isset($_SESSION['users']) && $details == null ? 'disabled' : '' ?> id="buyButton" type="submit" class="btn btn-primary">Compra</button>
        </form>

        <?php if (isset($_SESSION['users']) && $details == null) { ?>
            <input class="mt-3" id="term" type="checkbox">
            <label for="term">Acconsento al salvataggio dei miei dati per acquisti futuri</label>
        <?php } ?>
    </div>
</div>
<?php if (isset($_SESSION['users']) && $details == null) { ?>
    <script src="<?= ROOT_URL ?>/assets/js/termCheckbox.js"></script>
<?php } ?>