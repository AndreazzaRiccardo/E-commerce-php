<?php
$page = isset($_GET["page"]) ? $_GET["page"] : 'products-list';
?>

<?php include "../inc/config.php" ?>

<?php include __DIR__ . "/../public/template-parts/header.php" ?>

<main class="container mt-5 position-relative ms_main" style="min-height: 86vh;">
    <div class="row">
        <div class="col-12 col-lg-9">
            <?php include __DIR__ . "/pages/" . $page . '.php' ?>
        </div>
        <div class="col-0 col-lg-3 d-none d-lg-block h-100">
            <?php
            if (isset($_GET['page']) || isset($_GET['search']) || isset($_GET['n_page'])) {

                if (isset($_GET['page']) && $_GET['page'] != 'cart' && $_GET['page'] != 'checkout') {
                    include_once __DIR__ . "/../public/template-parts/sidebar.php";
                } elseif (isset($_GET['page']) && $_GET['page'] == 'checkout') {
                    include __DIR__ . "/../public/template-parts/sidebar_report.php";
                } elseif (isset($_GET['search']) || isset($_GET['n_page'])) {
                    include_once __DIR__ . "/../public/template-parts/sidebar.php";
                }
            }

            ?>
        </div>
    </div>
</main>

<?php include __DIR__ . "/../public/template-parts/footer.php" ?>