<?php
if (!defined('ROOT_URL')) {
    die;
}

$productMgr = new ProductManager();
$currentPage = isset($_GET['n_page']) ? intval($_GET['n_page']) : 1;

if (isset($_POST['delete'])) {
    $productID = htmlspecialchars(trim($_POST['id']));
    $productMgr->delete($productID);
}

if (isset($_GET['search'])) {
    $products = $productMgr->filter($_GET['search']);
} else {
    $products = $productMgr->getAll(10, $currentPage);
}

// Paginazione

$disabledPrev = '';
$disabledNext = '';
if(isset($_GET['n_page']) && $_GET['n_page'] == 1 || !isset($_GET['n_page'])){
    $disabledPrev = 'disabled';
} elseif (count($products) < 10) {
    $disabledNext = 'disabled';
} 

?>

<?php if (isset($_GET['search'])) { ?>
    <a class="ps-1 fs-4" href="<?= ROOT_URL ?>admin/?page=products-list">
        << Lista Prodotti</a>
        <?php } else { ?>
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
                <a class="btn btn-sm btn-outline-primary rounded fs-4" href="<?= ROOT_URL ?>admin/?page=create_product">+</a>
                <form id="paginationForm" method="GET">
                    <input type="hidden" id="page" name="n_page" min="1" value="<?php echo $currentPage; ?>">
                    <button <?= $disabledPrev ?> type="button" id="prevPage" class="btn btn-sm btn-dark mr-2"><<</button>
                    <button <?= $disabledNext ?> type="button" id="nextPage" class="btn btn-sm btn-dark">>></button>
                </form>
            </div>
        <?php } ?>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-5 row-cols-xll-6 mt-4">
            <?php if ($products) { ?>
                <?php foreach ($products as $product) { ?>
                    <div class="col p-2">
                        <div class="card shadow ms_card">
                            <img src="<?php
                                        $image_path = $product->image_path ? ROOT_URL . $product->image_path : ROOT_URL . "/public/imgs/noimg.jpg";
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
                                <hr>
                                <div class="d-flex justify-content-between gap-2">
                                    <a title="Modifica" href="?page=edit_product&id=<?= $product->id ?>" class="ms_btn_yellow btn text-dark fs-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <button title="Elimina" type="button" class="ms_btn_red btn text-dark fs-2" data-bs-toggle="modal" data-bs-target="#modal-delete"><i class="fa-solid fa-trash-arrow-up"></i></button>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <h2>Nessun Prodotto Disponibile</h2>
            <?php } ?>
        </div>
        <?php require_once __DIR__ . "/../template-parts/modal.php" ?>
        <script src="<?= ROOT_URL ?>/assets/js/pagination.js"></script>