<?php
$ordersMgr = new OrderManager();
$myOrders = $ordersMgr->getUserOrders($logUser->id);
?>

<h2>I miei ordini</h2>

<div class="row row-cols-md-3 mt-5">
    <?php foreach ($myOrders as $index => $order) { ?>
        <div class="col g-3">
            <div class="card h-100 shadow">
                <div class="card-header fw-bolder text-center">Ordine N. <?= $index + 1 ?></div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title mb-4">Dettagli</h5>
                    <?php $orderDetails = $ordersMgr->getOrderDetails($order['cart_id']);
                    foreach ($orderDetails as $product) { ?>
                        <p class="card-text"><?= $product['product_name'] ?> <strong>X <?= $product['quantity'] ?></strong></p>
                    <?php } ?>
                    <div class="mt-auto">
                        <p class="card-text text-end"><small class="text-body-secondary"><?= date("Y-m-d", strtotime($order['created_at'])) ?></small></p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>