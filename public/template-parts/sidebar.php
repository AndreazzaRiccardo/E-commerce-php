<?php

$cm = new CartManager();
$cartID = $cm->getCartID();


if (isset($_POST['minus'])) {
    $productID = htmlspecialchars(trim($_POST['id']));
    $cm->removeFromCart($productID, $cartID);
}

if (isset($_POST['plus'])) {

    $productID = htmlspecialchars(trim($_POST['id']));
    $cm->addToCart($productID, $cartID);
}

$cart_total = $cm->getCartTotal($cartID);
$cart_items = $cm->getCartItems($cartID);


?>

<div class="col-3 d-none d-lg-block">
    <div class="card shadow"">
        <div class=" card-body">
        <h5 class="card-title text-center fs-3">CARRELLO</h5>
        <div class="col-12 order-md-last">
            <?php if (count($cart_items) > 0) { ?>
                <ul class="list-group mb-3">
                    <?php foreach ($cart_items as $item) { ?>
                        <li class="list-group-item lh-sm py-4 px-2">
                            <div class="row w-100 d-flex justify-content-between">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="my-0 text-truncate"><?= $item['name'] ?></h6>
                                </div>
                                <div class="col-6 px-0 text-end">
                                    <form method="POST">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button name="minus" type="submit" class="btn px-2 py-0 btn-sm btn-primary">-</button>
                                            <span class="text-muted border border-dark px-2 d-flex align-items-center justify-content-center" style="width: 30px;"><?= $item['quantity'] ?></span>
                                            <button name="plus" type="submit" class="btn px-2 py-0 btn-sm btn-primary">+</button>
                                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                    <li class="list-group-item d-flex justify-content-between px-4">
                        <span>TOTALE EURO</span>
                        <strong><?= $cart_total['total'] ?> €</strong>
                    </li>
                </ul>
                <a href="<?= ROOT_URL ?>shop/?page=cart" class="btn btn-warning w-100 text-dark">Acquista</a>
            <?php } else { ?>
                <div class="text-center" style="font-size: 5rem;">
                    <i class="fa-solid fa-bag-shopping"></i>
                </div>
                <p class="card-text text-center">Aggiungi prodotti al carrello per cominciare a comprare</p>
            <? } ?>

        </div>
    </div>
</div>
</div>