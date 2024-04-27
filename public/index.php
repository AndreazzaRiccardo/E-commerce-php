<?php include "../inc/config.php"; ?>

<?php

$page = isset($_GET["page"]) ? $_GET["page"] : 'homepage';

if (isset($_SESSION['users'])) {
    if ($_SESSION['users']->is_admin) {
        header('Location: ../admin');
    }
}

?>

<?php include __DIR__ . "/../public/template-parts/header.php" ?>

<main class="container mt-5 ms_main" style="min-height: 86vh;">
    <div class="row">
        <div class="col-12 col-lg-9">
            <?php if(isset($_GET['search'])) {
                include __DIR__ . "/../shop/pages/products-list.php";
            } else {
                include __DIR__ . "/pages/" . $page . '.php';
            }  ?>
        </div>
        <div class="col-0 col-lg-3 d-none d-lg-block h-100">
            <?php include __DIR__ . "/../public/template-parts/sidebar.php" ?>
        </div>

    </div>
</main>

<?php include __DIR__ . "/../public/template-parts/footer.php" ?>
