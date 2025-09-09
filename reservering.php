<?php
include_once "config.php";

if (!isset($_GET["id"])) {
    die("Geen restaurant geselecteerd.");
}
$restaurant_id = intval($_GET["id"]);

// Restaurantinformatie ophalen
$queryRestaurant = "SELECT * FROM restaurants WHERE id = ?";
$stmt = $connect->prepare($queryRestaurant);
$stmt->execute([$restaurant_id]);
$restaurant = $stmt->fetch();

if (!$restaurant) {
    die("Restaurant niet gevonden.");
}

$error = null;

// Verwerking reservering
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $party_size = intval($_POST["party_size"]);
    $reservation_time = $_POST["reservation_time"];
    $special_requests = !empty($_POST["special_requests"]) ? trim($_POST["special_requests"]) : null;

    if (!empty($email) && !empty($phone) && $party_size > 0 && !empty($reservation_time)) {
        $sql = "INSERT INTO reservations (email, phone, restaurant_id, party_size, reservation_time, special_requests, status, created_at, updated_at) 
                VALUES (?, ?, ?, ?, ?, ?, 'pending', NOW(), NOW())";
        $stmt = $connect->prepare($sql);

        if ($stmt->execute([$email, $phone, $restaurant_id, $party_size, $reservation_time, $special_requests])) {
            header("Location: menu.php?id=" . $restaurant_id . "&reserved=1");
            exit();
        } else {
            $error = "Er ging iets mis met het opslaan van je reservering. Probeer het opnieuw.";
        }
    } else {
        $error = "Vul alle verplichte velden in.";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Reserveren bij <?= htmlspecialchars($restaurant["name"]); ?> - Table Time</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body { font-family: Arial, sans-serif; }
        .wrapper { max-width: 600px; margin: 40px auto; padding: 20px; }
    </style>
</head>
<body>
    <?php include_once "header.html" ?>
<div class="wrapper">
    <h2>Reserveren bij <?= htmlspecialchars($restaurant["name"]); ?></h2>
    <p>Vul hieronder je gegevens in om een reservering te plaatsen.</p>

    <?php if ($error): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form action="reservering.php?id=<?= $restaurant_id ?>" method="POST">
        <div class="form-group">
            <label for="email">E-mailadres *</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="phone">Telefoonnummer *</label>
            <input type="text" name="phone" id="phone" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="party_size">Aantal personen *</label>
            <input type="number" name="party_size" id="party_size" class="form-control" min="1" max="<?= htmlspecialchars($restaurant["capacity"]); ?>" required>
        </div>

        <div class="form-group">
            <label for="reservation_time">Datum & Tijd *</label>
            <input type="datetime-local" name="reservation_time" id="reservation_time" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="special_requests">Speciale wensen (optioneel)</label>
            <textarea name="special_requests" id="special_requests" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-warning">Reservering plaatsen</button>
        <a href="menu.php?id=<?= $restaurant_id ?>" class="btn btn-danger">Annuleren</a>
    </form>
</div>
</body>
</html>
