<?php

if (!defined('ROOT_URL')) {
    die;
}

$productMgr = new ProductManager();
$currentPage = isset($_GET['n_page']) ? intval($_GET['n_page']) : 1;


// Logica carrello

if (isset($_POST['add_to_cart'])) {

    $productID = htmlspecialchars(trim($_POST['id']));

    $cm = new CartManager();
    $cartID = $cm->getCartID();

    $cm->addToCart($productID, $cartID);
}


// Ricerca

if (isset($_GET['search'])) {
    $products = $productMgr->filter($_GET['search']);
} else {
    $products = $productMgr->getAll(9, $currentPage);
}


// Paginazione

$disabledPrev = '';
$disabledNext = '';
if(isset($_GET['n_page']) && $_GET['n_page'] == 1 || !isset($_GET['n_page'])){
    $disabledPrev = 'disabled';
} elseif (count($products) < 9) {
    $disabledNext = 'disabled';
}
?>

<?php if (isset($_GET['search'])) { ?>
    <a class="ps-1 fs-4" href="<?= ROOT_URL ?>shop/?page=products-list">
        << Lista Prodotti</a>
        <?php } else { ?>
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                <h2>I nostri prodotti</h2>
                <form id="paginationForm" method="GET">
                    <input type="hidden" id="page" name="n_page" min="1" value="<?php echo $currentPage; ?>">
                    <button <?= $disabledPrev ?> type="button" id="prevPage" class="btn btn-sm btn-dark mr-2"><<</button>
                    <button <?= $disabledNext ?> type="button" id="nextPage" class="btn btn-sm btn-dark">>></button>
                </form>
            </div>

        <?php } ?>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-3 row-cols-xll-4 mt-4">
            <?php if ($products) { ?>
                <?php foreach ($products as $product) { ?>
                    <div class="col p-3">
                        <div class="card ms_card shadow">
                            <img src="<?php
                                        $image_path = $product->image_path ? ROOT_URL . $product->image_path : ROOT_URL . "/assets/imgs/noimg.jpg";
                                        echo $image_path;
                                        ?>" class="card-img-top" style="height: 200px; object-fit: contain;" alt="<?= "Immagine" . ' ' . $product->name ?>">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <h5 class="card-title bg-dark text-light p-2 text-truncate"><?= $product->name ?></h5>

                                <div class="accordion" id="acc-description">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne<?= $product->id ?>" aria-expanded="false" aria-controls="flush-collapseOne">
                                                <p class="text-truncate m-0"><?= $product->description ?></p>
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
                                    <form method="POST">
                                        <input type="hidden" name="id" value="<?= $product->id ?>">
                                        <input type="submit" name="add_to_cart" class="btn btn-sm btn-warning fs-6 text-nowrap border border-dark text-dark" value="Add Cart">
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <h2>Nessun Prodotto Disponibile</h2>
            <?php } ?>
        </div>

        <script src="<?= ROOT_URL ?>/assets/js/pagination.js"></script>