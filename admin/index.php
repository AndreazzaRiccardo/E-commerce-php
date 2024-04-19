<?php include "../inc/config.php" ?>

<?php
if (!$_SESSION['user']->is_admin) {
    die;
}

if (isset($_GET['search'])) {
    $page = 'products-list';
} else {
    $page = isset($_GET["page"]) ? $_GET["page"] : 'dashboard';
}

?>


<?php include __DIR__ . "/../admin/template-parts/header.php" ?>

<main class="container-fluid">
    <div class="row d-block d-md-flex" style="min-height: 62vh;">
        <?php include __DIR__ . "/../admin/template-parts/sidebar.php" ?>
        <div class="col-12 col-md-11 px-5 my-4">
            <?php include __DIR__ . "/pages/" . $page . '.php' ?>
        </div>
    </div>
</main>

<?php include __DIR__ . "/../admin/template-parts/footer.php" ?>