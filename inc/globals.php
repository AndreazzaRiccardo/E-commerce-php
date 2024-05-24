<?php
$logUser = null;

if (isset($_SESSION['users'])) {
    $logUser = $_SESSION['users'];
}

date_default_timezone_set('Europe/Rome');
