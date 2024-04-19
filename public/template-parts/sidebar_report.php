<?php

$cm = new CartManager();
$cartID = $cm->getCartID();

$cart_total = $cm->getCartTotal($cartID);
$cart_items = $cm->getCartItems($cartID);

?>

<div class="col-3 d-none d-lg-block">
    <div class="card shadow"">
        <div class=" card-body">
        <h5 class="card-title text-center fs-3">Resoconto</h5>
        <div class="col-12 order-md-last">
            <ul class="list-group mb-3">
                <?php foreach ($cart_items as $item) { ?>
                    <li class="list-group-item lh-sm py-4 px-2">
                        <div class="row w-100 d-flex justify-content-between">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="my-0 text-truncate"><?= $item['name'] ?></h6>
                            </div>
                            <div class="col-6 px-0 text-end">
                                <span class="text-muted" style="width: 30px;">x <?= $item['quantity'] ?></span>
                            </div>
                        </div>
                    </li>
                <?php } ?>
                <li class="list-group-item d-flex justify-content-between px-4">
                    <span>TOTALE EURO</span>
                    <strong><?= $cart_total['total'] ?> €</strong>
                </li>
            </ul>
        </div>
    </div>
</div>