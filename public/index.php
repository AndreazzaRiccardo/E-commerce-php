<?php
include "../inc/config.php";

$page = isset($_GET["page"]) ? $_GET["page"] : 'homepage';

if (isset($_SESSION['users'])) {
    if ($_SESSION['users']->is_admin) {
        header('Location: ../admin');
    }
}

?>

<?php  ?>

<?php include __DIR__ . "/template-parts/header.php" ?>

<main class="container mt-5 ms_main" style="min-height: 86vh;">
    <div class="row">
        <div class="col-12 col-lg-9">
            <?php if(isset($_GET['search'])) {
                include __DIR__ . "/../shop/pages/products-list.php";
            } else {
                include __DIR__ . "/pages/" . $page . '.php';
            }  ?>
        </div>
        
        <?php include __DIR__ . "/template-parts/sidebar.php" ?>

    </div>
</main>

<?php include __DIR__ . "/template-parts/footer.php" ?>