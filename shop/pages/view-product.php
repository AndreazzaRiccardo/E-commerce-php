<?php

// Controlli

if (!defined('ROOT_URL')) {
    die;
}

if (!isset($_GET['id'])) {
    header('Location: ../public');
    exit();
}


// Logica carrello

if (isset($_POST['add_to_cart'])) {

    $productID = htmlspecialchars(trim($_POST['id']));

    $cm = new CartManager();
    $cartID = $cm->getCartID();

    $cm->addToCart($productID, $cartID);
}

// Visualizza prodotto

$id = htmlspecialchars(trim($_GET['id']));
$my_product = new ProductManager();
$product = $my_product->get($id);

if (!(property_exists($product, 'id'))) {
    header('Location: ../public');
    exit();
}
?>

<a class="ps-1 fs-4" href="<?= ROOT_URL ?>shop/?page=products-list">
    << Lista Prodotti</a>
        <div class="card my-5 d-flex align-items-center justify-content-center">
            <div class=" row g-0">
                <div class="col-md-4">
                    <img src="<?php
                                $image_path = $product->image_path ? ROOT_URL . $product->image_path : ROOT_URL . "/public/imgs/noimg.jpg";
                                echo $image_path;
                                ?>" class="img-fluid rounded-start" alt="<?= "Immagine" . ' ' . $product->name ?>">
                </div>
                <div class="col-md-8">
                    <div class="card-body d-flex flex-column justify-content-between h-100 gap-5">
                        <div>
                            <h2 class="card-title"><?= $product->name ?></h2>
                            <p class="fw-bolder">Prezzo: <?= $product->price ?> €</p>
                            <hr>
                            <p class="card-text"><?= $product->description ?></p>
                        </div>
                        <form class="align-self-end" method="POST">
                            <input type="hidden" name="id" value="<?= $product->id ?>">
                            <input type="submit" name="add_to_cart" class="btn btn-warning align-self-end text-dark" value="Aggiungi al Carrello">
                        </form>
                    </div>
                </div>
            </div>
        </div>