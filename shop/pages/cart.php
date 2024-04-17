<?php

$cm = new CartManager();
$cartID = $cm->getCartID();


if(isset($_POST['minus'])){
    $productID = htmlspecialchars(trim($_POST['id']));
    $cm->removeFromCart($productID, $cartID);
}

if(isset($_POST['plus'])){

    $productID = htmlspecialchars(trim($_POST['id']));
    $cm->addToCart($productID, $cartID);
}

$cart_total = $cm->getCartTotal($cartID);
$cart_items = $cm->getCartItems($cartID);


?>

<div class="col-12 order-md-last">
    <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-primary">CARRELLO</span>
        <?php if (count($cart_items) > 0) { ?>
            <span class="badge bg-primary rounded-pill py-2"><?= $cart_total['num_products'] ?>Elementi nel Carrello</span>
        <?php } ?>
    </h4>
    <?php if (count($cart_items) > 0) { ?>
        <ul class="list-group mb-3">
            <?php foreach ($cart_items as $item) { ?>
                <li class="list-group-item d-flex justify-content-between lh-sm p-4">
                    <div class="row w-100">
                        <div class="col-6 col-lg-4 d-flex align-items-center">
                            <h6 class="my-0"><?= $item['name'] ?></h6>
                        </div>
                        <div class="col-6 col-lg-2 d-flex align-items-center">
                            <span class="text-muted"><?= $item['single_price'] ?>€</span>
                        </div>
                        <div class="col-6 col-lg-4">
                            <form method="POST">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button name="minus" type="submit" class="btn px-2 py-0 btn-sm btn-primary fs-4">-</button>
                                    <span class="text-muted border border-dark px-3 d-flex align-items-center"><?= $item['quantity'] ?></span>
                                    <button name="plus" type="submit" class="btn px-2 py-0 btn-sm btn-primary fs-4">+</button>
                                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                </div>
                            </form>
                        </div>
                        <div class="col-6 col-lg-2 d-flex align-items-center">
                            <strong><?= $item['total_price'] ?></strong>
                        </div>
                    </div>
                </li>
            <?php } ?>
            <!-- <li class="list-group-item d-flex justify-content-between bg-light">
            <div class="text-success">
              <h6 class="my-0">Promo code</h6>
              <small>EXAMPLECODE</small>
            </div>
            <span class="text-success">−$5</span>
          </li> -->
            <li class="list-group-item d-flex justify-content-between px-4">
                <span>TOTALE EURO</span>
                <strong><?= $cart_total['total'] ?> €</strong>
            </li>
        </ul>

        <hr>

        <button class="btn btn-primary w-100">CHECKOUT</button>
    <?php } else { ?>
        <p class="lead">Il tuo Carrello è vuoto</p>
        <a href="<?= ROOT_URL ?>shop/?page=products-list" class="btn btn-primary">Torna a fare acquisti &raquo;</a>
    <? } ?>

    <!-- <form class="card p-2">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Promo code">
            <button type="submit" class="btn btn-secondary">Redeem</button>
          </div>
        </form> -->
</div>