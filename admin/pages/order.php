<?php
if (!isset($_GET['id'])) {
    header('Location: ../admin');
    exit();
}

$id = htmlspecialchars(trim($_GET['id']));
$my_order = new orderManager();
$order = $my_order->get($id);

$orderDetails = $my_order->getOrderDetails($order->cart_id);

if (!(property_exists($order, 'id'))) {
    header('Location: ../admin');
    exit();
}

?>

<div class="col-md-6 offset-md-3 my-4">
    <div class="card mt-5">
        <h5 class="card-header text-center">Ordine N.<?= $order->id ?></h5>
        <div class="card-body">
            <h5 class="card-title mb-3">Dettagli Cliente</h5>
            <p class="card-text"><strong>Nome Cliente:</strong> <?= $order->name ?></p>
            <p class="card-text"><strong>Indirizzo:</strong> <?= $order->address ?></p>
            <p class="card-text"><strong>Telefono:</strong> <?= $order->phone ?></p>
            <p class="card-text"><strong>Note:</strong> <?= $order->note ?></p>
            <hr>
            <h5 class="card-title mb-3 text-center">Dettagli Ordine</h5>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3">
                <?php foreach ($orderDetails as $product) { ?>
                    <div class="col text-center border-bottom">
                        <p class="card-text"><?= $product['product_name'] ?> <strong>X <?= $product['quantity'] ?></strong> </p>
                    </div>
                <?php } ?>
            </div>
            <h5 class="card-title mb-3 text-center mt-5">TOTALE</h5>
            <p class="card-text text-center"><?= $order->total_amount ?> €</p>
        </div>
    </div>
</div>