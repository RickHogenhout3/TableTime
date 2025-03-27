<?php
require __DIR__ . '/vendor/autoload.php';

$env = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
$env->load();

session_start();
$host = getenv('DB_HOST');
$dbname = getenv('DB_NAME');
$username = getenv('DB_USER');
$password = getenv('DB_PASSWORD');
$charset = "utf8mb4";

try {
    $connect = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection succeeded!";
} catch (PDOException $error) {
    $message = $error->getMessage();
    echo "Connection failed: $message";
    die();
}