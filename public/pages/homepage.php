<?php if (isset($_GET['message'])) { ?>
    <h2><?= $_GET['message'] ?></h2>
    <a class="btn btn-primary mt-3" href="<?= ROOT_URL ?>shop/?page=products-list">Vai allo Shopping &raquo;</a>
<?php } else { ?>
    <h1>Home Page</h1>
    <?php if (!isset($_SESSION['users'])) { ?>
        <p class="lead">Benvenuti nel mio sito Portfolio !</p>
    <?php } else { ?>
        <p class="lead">Bentornato <?= $_SESSION['users']->email ?> !</p>
    <?php } ?>
    <p class="lead">Clicca per iniziare ad acquistare o scorri le pagine per saperne di pi&ugrave; su di me !</p>
    <a class="btn btn-primary mt-3" href="<?= ROOT_URL ?>shop/?page=products-list">Vai allo Shopping &raquo;</a>
    <div class="ms_video-container mt-5">
        <video controls>
            <source src="<?= ROOT_URL . 'public/video/presentation.mp4' ?>" type="video/mp4">
            Il tuo browser non supporta la riproduzione di video.
        </video>
    </div>
<?php } ?>