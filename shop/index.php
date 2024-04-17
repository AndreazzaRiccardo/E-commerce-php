<?php
$page = isset($_GET["page"]) ? $_GET["page"] : 'products-list';
?>

<?php include "../inc/config.php" ?>

<?php include __DIR__ . "/../public/template-parts/header.php" ?>

<main class="container mt-5" style="min-height: 50vh;">
    <div class="row">
        <div class="col-12 col-md-9">
        <?php include __DIR__ . "/pages/" . $page . '.php' ?>
        </div>
        <?php 
        if($_GET['page'] != 'cart'){
            include __DIR__ . "/../public/template-parts/sidebar.php" ;
        }
        
        ?>

    </div>
</main>

<?php include __DIR__ . "/../public/template-parts/footer.php" ?>