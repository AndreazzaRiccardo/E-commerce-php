<?php
$page = isset($_GET["page"]) ? $_GET["page"] : 'homepage.php';
?>

<?php include __DIR__ . "/template-parts/header.php" ?>

<main class="container mt-5">
    <div class="row">
        <div class="col-9">
        <?php include __DIR__ . "/pages/" . $page ?>
        </div>

        <?php include __DIR__ . "/template-parts/sidebar.php" ?>

    </div>
</main>

<?php include __DIR__ . "/template-parts/footer.php" ?>