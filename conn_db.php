<?php
// Parametri per la connessione al database
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "ecommerce_db";

$first_conn = mysqli_connect($servername, $username, $password);

// Verifica della connessione
if (!$first_conn) {
    die("Connessione fallita" . mysqli_connect_error());
}

$result = mysqli_query($first_conn, "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$dbname'");

if (mysqli_num_rows($result) == 0) {

    $sql_create_db = "CREATE DATABASE $dbname";
    mysqli_query($first_conn, $sql_create_db);

    mysqli_select_db($first_conn, $dbname);

    $sql_file = './ecommerce_db.sql';
    $sql_queries = file_get_contents($sql_file);
    mysqli_multi_query($first_conn, $sql_queries);
}

// Chiudi la connessione
mysqli_close($first_conn);

require "./inc/config.php";
?>