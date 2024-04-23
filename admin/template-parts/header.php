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
<div id="backgroundContainer"></div>
    <header class="p-2 bg-primary text-white shadow position-fixed top-0 left-0 w-100">
        <nav class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-between">
                <a href="#" class="d-flex align-items-center me-5 mb-2 mb-lg-0 text-warning fw-bolder fs-4 text-decoration-none">
                    PHP E-commerce
                </a>
                <div class="d-flex flex-column flex-sm-row justify-content-center">
                    <form method="GET" class="col-lg-auto mb-3 mb-lg-0 me-lg-3">
                        <input id="searchbar" name="search" type="search" class="form-control form-control-dark" placeholder="Cerca per nome" aria-label="Search">
                    </form>
                    <div>
                        <a class="btn dropdown-toggle text-light text-truncate" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Amministrazione
                        </a>
                        <ul class="dropdown-menu bg-primary dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item text-light" href="<?= ROOT_URL ?>admin/?page=dashboard">Dashboard</a></li>
                            <li>
                                <hr class="dropdown-divider border-light">
                            <li><a class="dropdown-item text-light" href="<?= ROOT_URL ?>auth/?page=logout">Logout</a></li>
                            <li>
                        </ul>
                    </div>
                </div>

            </div>
        </nav>
    </header>