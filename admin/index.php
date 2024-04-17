<?php include "../inc/config.php" ?>

<?php
if(!$_SESSION['user']->is_admin){
    die;
}

$page = isset($_GET["page"]) ? $_GET["page"] : 'dashboard';
?>



<?php include __DIR__ . "/../public/template-parts/header.php" ?>

<main class="container">
    <div class="row d-block d-md-flex" style="min-height: 50vh;">
    <?php include __DIR__ . "/../admin/template-parts/sidebar.php" ?>
        <div class="col-12 col-md-11">
        <?php include __DIR__ . "/pages/" . $page . '.php' ?>
        </div>
    </div>
</main>

<?php include __DIR__ . "/../public/template-parts/footer.php" ?>