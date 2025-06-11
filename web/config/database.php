<?php
$host = 'localhost';
$dbname = 'task_tracker';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("CREATE DATABASE IF NOT EXISTS $dbname");
    $pdo->exec("USE $dbname");
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
