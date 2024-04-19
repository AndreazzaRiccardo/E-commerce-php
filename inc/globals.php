<?php
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSW, DB_NAME);

$logUser = null;

if (isset($_SESSION['user'])) {
    $logUser = $_SESSION['user'];
}
