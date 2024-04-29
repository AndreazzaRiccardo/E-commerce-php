<?php
if (!$_SESSION['users']->is_admin) {
    die;
}

$page = '';
if(isset($_GET["page"])) {
    $page = $_GET["page"];
} elseif (isset($_GET["n_page"]) || isset($_GET["search"])) {
    $page = 'products-list';
} else {
    $page = 'dashboard';
}

?>

<?php include "../inc/config.php" ?>


<?php include __DIR__ . "/../admin/template-parts/header.php" ?>

<main class="container-fluid admin_main">
    <div class="row d-block d-md-flex align-items-strech" style="min-height: 86vh;">
        <?php include __DIR__ . "/../admin/template-parts/sidebar.php" ?>
        <div class="col-12 col-md-11 px-5 my-4">
            <?php include __DIR__ . "/pages/" . $page . '.php' ?>
        </div>
    </div>
</main>

<?php include __DIR__ . "/../admin/template-parts/footer.php" ?>