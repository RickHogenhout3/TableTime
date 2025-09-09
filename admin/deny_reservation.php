<?php
include_once "../config.php";

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$reservation_id = $_GET['id'];

$query = "UPDATE reservations SET status = 'cancelled' WHERE id = ?";
$stmt = $connect->prepare($query);
$stmt->execute([$reservation_id]);

header("Location: index.php");
exit();
