<?php

$host = "localhost";
$port = 3306;
$dbName = "blog";
$username = "Danylo";
$password = "12345678";

$dsn = "mysql:host={$host};port={$port};dbname={$dbName};charset=utf8";

try {
    $pdo = new PDO($dsn, $username, $password);

    $pdo->setAttribute(PDO::FETCH_ASSOC, PDO::ERRMODE_EXCEPTION, );
    echo "Database is connected<br/>";
} catch (PDOException $e) {
    echo "Database isn't connected: " . $e->getMessage();
}