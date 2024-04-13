<?php
$productMgr = new ProductManager();
$products = $productMgr->getAll();
?>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4">
    <?php if ($products) { ?>
        <?php foreach ($products as $product) { ?>
            <div class="col p-3">
                <div class="card h-100 ">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="card-title"><?= $product->name ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $product->price . "€" ?></h6>
                        <p class="card-text"><?= $product->description ?></p>
                        <a href="<?= ROOT_URL . 'shop/?page=view-product&id=' . $product->id ?> " class="card-link">Dettagli</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } else { ?>
        <h2>Nessun Prodotto Disponibile</h2>
    <?php } ?>
</div>