<?php

$dsn = 'mysql:host=localhost;dbname=test';
$user = 'root';
$pass = '';
$option = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET DB',
);
try {
    $conn = new PDO($dsn, $email, $pass, $option);
    $conn->setSttribute(PDO::ATTR_ERRMODE, PDO::ERMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Could not connect' . $e->getMessage();
}

?>