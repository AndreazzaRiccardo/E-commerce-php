<?php
$page = isset($_GET["page"]) ? $_GET["page"] : 'dashboard';
?>

<?php include "../inc/init.php" ?>

<?php include __DIR__ . "/../public/template-parts/header.php" ?>

<main class="container mt-5">
    <div class="row">
        <div class="col-9">
        <?php include __DIR__ . "/pages/" . $page . '.php' ?>
        </div>
        <?php include __DIR__ . "/../public/template-parts/sidebar.php" ?>

    </div>
</main>

<?php include __DIR__ . "/../public/template-parts/footer.php" ?>