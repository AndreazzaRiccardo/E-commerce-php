<?php
if (!defined('ROOT_URL')) {
    die;
}

$userMgr = new UserManager();
$orderMgr = new OrderManager();
$cm = new CartManager();

if (isset($_SESSION['users'])) {
    $userID = $_SESSION['users']->id;
    $user = $userMgr->get($userID);
    $detailsMgr = new UserDetailsManager();
    $details = $detailsMgr->getDetails($userID);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cartID = $cm->getCartID();
    $query = $cm->getCartTotal($cartID);
    $cart_total = $query['total'];
    if(isset($_SESSION['users'])) {
        $orderMgr->create((object)[
            'name' => $_POST['name'],
            'address' => $_POST['address'],
            'phone' => $_POST['phone'],
            'total_amount' => $cart_total,
            'cart_id' => $cartID,
            'user_id' => $userID
        ]);
    } else {
        $orderMgr->create((object)[
            'name' => $_POST['name'],
            'address' => $_POST['address'],
            'phone' => $_POST['phone'],
            'total_amount' => $cart_total,
            'cart_id' => $cartID,
        ]);
    }
    if (isset($_SESSION['users']) && $details == null) {
        $detailsMgr->create((object)[
            'name' => $_POST['name'],
            'address' => $_POST['address'],
            'phone' => $_POST['phone'],
            'user_id' => $userID
        ]);
    }
    $cm->startNewClientSession();
    header("Location: ../public/?page=homepage&message=Acquisto effettuato con successo");
    exit;
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
                <input name="email" required type="email" class="form-control" value="<?= isset($user->email) ? $user->email : '' ?>" id="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Indirizzo</label>
                <input name="address" value="<?= isset($details['address']) ? htmlspecialchars($details['address']) : '' ?>" required type="text" class="form-control" id="address">
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Telefono</label>
                <input name="phone" value="<?= isset($details['phone']) ? htmlspecialchars($details['phone']) : '' ?>" required type="tel" class="form-control" id="phone">
            </div>

            <button <?= isset($_SESSION['users']) && $details == null ? 'disabled' : '' ?> id="buyButton" type="submit" class="btn btn-primary">Compra</button>
        </form>

        <?php if (isset($_SESSION['users']) && $details == null) { ?>
            <input class="mt-3" id="term" type="checkbox">
            <label for="term">Acconsento al salvataggio dei miei dati per acquisti futuri</label>
        <?php } ?>
    </div>
</div>

<script src="<?= ROOT_URL ?>/assets/js/termCheckbox.js"></script>