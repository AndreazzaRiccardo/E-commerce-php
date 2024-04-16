<h1>Benvenuti</h1>
<?php if(!isset($_SESSION['user'])){ ?>
<p class="lead">Benvenuti nel mio sito Portfolio !</p>
<?php } else { ?>
    <p class="lead">Bentornato <?= $_SESSION['user']->email ?> !</p>
    <?php } ?>
<p class="lead">Clicca per iniziare ad acquistare o scorri le pagine per saperne di più su di me !</p>
<a class="btn btn-primary" href="<?= ROOT_URL ?>shop/?page=products-list">Vai allo Shopping &raquo;</a>