<?php
$page = isset($_GET["page"]) ? $_GET["page"] : 'homepage';

?>

<?php include "../inc/config.php" ?>

<?php include __DIR__ . "/template-parts/header.php" ?>

<main class="container mt-5" style="min-height: 50vh;">
    <div class="row">
        <div class="col-12 col-md-9">
            <?php include __DIR__ . "/pages/" . $page . '.php' ?>
        </div>

        <?php include __DIR__ . "/template-parts/sidebar.php" ?>

    </div>
</main>

<?php include __DIR__ . "/template-parts/footer.php" ?>