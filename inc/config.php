<?php

session_start();

define('ROOT_URL', "http://" . $_SERVER['HTTP_HOST'] . "/E-commerce-php/");

// Env DB
define('DB_HOST', "localhost");
define('DB_USER', "root");
define('DB_PASSW', "root");
define('DB_NAME', "ecommerce_db");

require_once __DIR__ . '/../inc/globals.php';
require_once __DIR__ . '/../classes/DB.php';
require_once __DIR__ . '/../classes/Product.php';
require_once __DIR__ . '/../classes/Cart.php';
require_once __DIR__ . '/../classes/User.php';


