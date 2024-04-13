<?php
if (!defined('ROOT_URL')) {
    die;
}

if (!isset($_GET['id'])) {
    header('Location: ../public');
    exit;
}
$id = htmlspecialchars(trim($_GET['id']));
$my_product = new ProductManager();
$product = $my_product->get($id);

if (!(property_exists($product, 'id'))) {
    header('Location: ../public');
    exit;
}
?>

<a href="<?= ROOT_URL ?>shop/?page=products-list">
    << Lista Prodotti</a>
<div class="card my-5"">
    <div class=" row g-0">
        <div class="col-md-4">
            <img src="<?= ROOT_URL . 'public/imgs/noimg.jpg' ?>" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body d-flex flex-column justify-content-between h-100 gap-5">
                <div>
                    <h2 class="card-title"><?= $product->name ?></h2>
                    <p class="fw-bolder">Prezzo: <?= $product->price ?> €</p>
                    <hr>
                    <p class="card-text"><?= $product->description ?></p>
                </div>
                <a href="#" class="btn btn-warning align-self-end text-dark">Aggiungi al Carrello</a>
            </div>
        </div>
    </div>
</div>