<?php
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSW, DB_NAME);

$logUser = null;

if (isset($_SESSION['users'])) {
    $logUser = $_SESSION['users'];
}
