<?php if (isset($_GET['message'])) { ?>
    <h2><?= $_GET['message'] ?></h2>
<?php } else { ?>
    <h1>Home Page</h1>
    <?php if (!isset($_SESSION['users'])) { ?>
        <p class="lead">Benvenuti nel mio sito Portfolio !</p>
    <?php } else { ?>
        <p class="lead">Bentornato <?= $_SESSION['users']->email ?> !</p>
    <?php } ?>
    <p class="lead">Clicca per iniziare ad acquistare o scorri le pagine per saperne di più su di me !</p>
<?php } ?>


<a class="btn btn-primary mt-3" href="<?= ROOT_URL ?>shop/?page=products-list">Vai allo Shopping &raquo;</a>