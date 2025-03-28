<?php
session_start();
include_once "../config.php";

if (!isset($_SESSION["restaurant_id"])) {
    header("Location: restaurant-login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$restaurant_id = $_SESSION["restaurant_id"];
$menu_id = $_GET['id'];

try {
    $stmt = $connect->prepare("DELETE FROM menus WHERE id = :id AND restaurant_id = :restaurant_id");
    $stmt->bindParam(':id', $menu_id, PDO::PARAM_INT);
    $stmt->bindParam(':restaurant_id', $restaurant_id, PDO::PARAM_INT);
    $stmt->execute();
} catch (PDOException $error) {
    echo "Error deleting menu item: " . $error->getMessage();
    exit();
}

// Redirect back to the index page
header("Location: index.php");
exit();
?>
