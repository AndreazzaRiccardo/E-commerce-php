<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php E-commerce</title>
    <link href="https://bootswatch.com/5/lux/bootstrap.css" rel="stylesheet">
    <link href="https://bootswatch.com/_vendor/bootstrap-icons/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://bootswatch.com/_vendor/prismjs/themes/prism-okaidia.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= ROOT_URL ?>assets/css/style.css">
</head>

<body>
    <header class="p-2 bg-primary text-white">
        <nav class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="<?= ROOT_URL ?>public/?page=homepage" class="d-flex align-items-center me-5 mb-2 mb-lg-0 text-warning fw-bolder fs-4 text-decoration-none">
                    PHP E-commerce
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="<?= ROOT_URL ?>public/?page=about" class="nav-link px-2 text-white">Chi Siamo</a></li>
                    <li><a href="<?= ROOT_URL ?>public/?page=services" class="nav-link px-2 text-white">Servizi</a></li>
                    <li><a href="<?= ROOT_URL ?>shop/?page=products-list" class="nav-link px-2 text-white">Prodotti</a></li>
                    <li><a href="<?= ROOT_URL ?>public/?page=contacts" class="nav-link px-2 text-white">Contatti</a></li>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                    <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
                </form>

                <div class="text-end">
                    <button type="button" class="btn btn-outline-light me-2">Login</button>
                    <button type="button" class="btn btn-warning">Sign-up</button>
                </div>
            </div>
        </nav>
    </header>