<?php include "../inc/config.php" ?>

<?php
$page = isset($_GET["page"]) ? $_GET["page"] : 'login';
?>

<?php include __DIR__ . "/../public/template-parts/header.php" ?>

<main class="container mt-5 ms_main" style="min-height: 86vh;">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-xl-6">
        <?php include __DIR__ . "/pages/" . $page . '.php' ?>
        </div>
    </div>
</main>

<?php include __DIR__ . "/../public/template-parts/footer.php" ?>