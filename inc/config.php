<?php
// phpinfo(); die;
// error_reporting(E_ALL ^ E_WARNING);
error_reporting(0);


session_start();

define('ROOT_URL', "http://" . $_SERVER['HTTP_HOST'] . "/E-commerce-php/");

// Env DB
define('DB_HOST', "localhost");
define('DB_USER', "root");
define('DB_PASSW', "root");
define('DB_NAME', "e_commerce");

require_once __DIR__ . '/../inc/globals.php';
require_once __DIR__ . '/../classes/DB.php';
require_once __DIR__ . '/../classes/Product.php';
require_once __DIR__ . '/../classes/Cart.php';
require_once __DIR__ . '/../classes/User.php';
require_once __DIR__ . '/../classes/Category.php';
require_once __DIR__ . '/../classes/Order.php';
require_once __DIR__ . '/../classes/UserDetails.php';
