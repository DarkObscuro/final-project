<?php
$dsn = 'mysql:host=localhost;dbname=z522016_my_guitar_shop2';
$username = 'z522016'; //change to your username (student ID)
$password = '1N87vKCW4QqZU8W-'; //change to your password (ssh password)
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

try {
    $db = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include 'errors/db_error_connect.php';
    exit;
}

function display_db_error($error_message) {
    include 'errors/db_error.php';
    exit;
}
?>