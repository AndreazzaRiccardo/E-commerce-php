<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php E-commerce</title>
    <link href="https://bootswatch.com/5/lux/bootstrap.css" rel="stylesheet">
    <link href="https://bootswatch.com/_vendor/bootstrap-icons/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://bootswatch.com/_vendor/prismjs/themes/prism-okaidia.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= ROOT_URL ?>/assets/css/style.css">
</head>

<body>
    <header class="p-2 bg-primary text-white">
        <nav class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-between">
                <a href="<?php if(!$_SESSION['user']->is_admin) { echo ROOT_URL . 'public/?page=homepage'; } ?>" class="d-flex align-items-center me-5 mb-2 mb-lg-0 text-warning fw-bolder fs-4 text-decoration-none">
                    PHP E-commerce
                </a>
                <?php if (!$_SESSION['user']->is_admin) { ?>
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="<?= ROOT_URL ?>public/?page=about" class="nav-link px-2 text-white">Chi Siamo</a></li>
                    <li><a href="<?= ROOT_URL ?>public/?page=services" class="nav-link px-2 text-white">Servizi</a></li>
                    <li><a href="<?= ROOT_URL ?>shop/?page=products-list" class="nav-link px-2 text-white">Prodotti</a></li>
                    <li><a href="<?= ROOT_URL ?>public/?page=contacts" class="nav-link px-2 text-white">Contatti</a></li>
                </ul>
                <form method="GET" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                    <input id="searchbar" name="search" type="search" class="form-control form-control-dark" placeholder="Cerca per nome" aria-label="Search">
                </form>
                <?php } ?>
                <div class="text-end">

                    <?php if (!isset($_SESSION['user'])) { ?>
                        <a class="btn dropdown-toggle text-light text-truncate" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Area Riservata
                        </a>
                        <ul class="dropdown-menu bg-primary" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item text-light" href="<?= ROOT_URL ?>auth/?page=login">Login</a></li>
                            <li>
                                <hr class="dropdown-divider border-light">
                            </li>
                            <li><a class="dropdown-item text-light" href="<?= ROOT_URL ?>auth/?page=sign_up">Sign-up</a></li>
                        </ul> 
                    <?php } ?>

                    <?php if (isset($_SESSION['user']) && !$_SESSION['user']->is_admin) { ?>
                        <a class="btn dropdown-toggle text-light text-truncate fs-6" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $_SESSION['user']->email ?>
                        </a>
                        <ul class="dropdown-menu bg-primary" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item text-light" href="<?= ROOT_URL ?>auth/?page=logout">Logout</a></li>
                            <li>
                        </ul>
                    <?php } ?>

                    <?php if (isset($_SESSION['user']) && $_SESSION['user']->is_admin) { ?>
                        <a class="btn dropdown-toggle text-light text-truncate" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Amministrazione
                        </a>
                        <ul class="dropdown-menu bg-primary" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item text-light" href="<?= ROOT_URL ?>admin/?page=dashboard">Dashboard</a></li>
                            <li>
                            <hr class="dropdown-divider border-light">
                            <li><a class="dropdown-item text-light" href="<?= ROOT_URL ?>auth/?page=logout">Logout</a></li>
                            <li>
                        </ul>
                    <?php } ?>

                    <?php if (!$_SESSION['user']->is_admin) { ?>
                    <a class="btn btn-outline-warning ms-2 py-2 position-relative" href="<?= ROOT_URL ?>shop/?page=cart">
                        <i class="fa-solid fa-cart-shopping fs-3"></i>
                        <span class="total-items fs-6 position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary"></span>
                    </a>
                    <?php } ?>
                </div>
            </div>
        </nav>
    </header>