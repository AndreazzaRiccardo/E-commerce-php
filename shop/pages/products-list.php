<?php
if (!defined('ROOT_URL')) {
    die;
}

$productMgr = new ProductManager();
$products = $productMgr->getAll();
?>

<div class="row row-cols-1 row-cols-sm-2 row-cols-xl-3 row-cols-xll-4">
    <?php if ($products) { ?>
        <?php foreach ($products as $product) { ?>
            <div class="col p-3">
                <div class="card">
                    <img src="<?php
                                $image_path = $product->image_path ? ROOT_URL . $product->image_path : ROOT_URL . "/public/imgs/noimg.jpg";
                                echo $image_path;
                    ?>" class="card-img-top" style="height: 200px; object-fit: contain;" alt="<?= "Immagine" . ' ' . $product->name ?>">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="card-title bg-dark text-light p-2"><?= $product->name ?></h5>

                        <div class="accordion" id="acc-description">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne<?= $product->id ?>" aria-expanded="false" aria-controls="flush-collapseOne">
                                        <p class="text-truncate m-0""><?= $product->description ?></p>
                                    </button>
                                </h2>
                                <div id="flush-collapseOne<?= $product->id ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body"><?= $product->description ?></div>
                                </div>
                            </div>
                        </div>

                        <p class="card-text"></p>
                        <h4 class="card-subtitle my-2 text-end"><?= $product->price . "€" ?></h4>
                        <div class="d-flex justify-content-between gap-2">
                            <a href="<?= ROOT_URL . 'shop/?page=view-product&id=' . $product->id ?> " class="btn btn-sm btn-light fs-6 border border-dark">Dettagli</a>
                            <a href="" class="btn btn-sm btn-warning fs-6 text-nowrap border border-dark text-dark">Add Cart</a>
                        </div>

                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } else { ?>
        <h2>Nessun Prodotto Disponibile</h2>
    <?php } ?>
</div>