<?php
include_once "../config.php"; 

// Zorg dat de gebruiker is ingelogd
if (!isset($_SESSION["restaurant_id"])) {
    header("Location: restaurant-login.php");
    exit();
}

$restaurant_id = $_SESSION["restaurant_id"];

// Haal huidige restaurantgegevens op
$sql = "SELECT * FROM restaurants WHERE id = ?";
$stmt = $connect->prepare($sql);
$stmt->execute([$restaurant_id]);
$restaurant = $stmt->fetch();

if (!$restaurant) {
    die("Restaurant niet gevonden.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $location = trim($_POST["location"]);
    $phone = trim($_POST["phone"]);
    $capacity = intval($_POST["capacity"]);

    // Als er een nieuw wachtwoord is ingevoerd → update het
    if (!empty($_POST["password"])) {
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $sql = "UPDATE restaurants SET name = ?, email = ?, password = ?, location = ?, phone = ?, capacity = ?, updated_at = NOW() WHERE id = ?";
        $params = [$name, $email, $password, $location, $phone, $capacity, $restaurant_id];
    } else {
        // Geen wachtwoord update
        $sql = "UPDATE restaurants SET name = ?, email = ?, location = ?, phone = ?, capacity = ?, updated_at = NOW() WHERE id = ?";
        $params = [$name, $email, $location, $phone, $capacity, $restaurant_id];
    }

    $stmt = $connect->prepare($sql);
    if ($stmt->execute($params)) {
        $_SESSION["restaurant_name"] = $name; // update de naam in sessie
        header("Location: index.php?updated=1");
        exit();
    } else {
        $error = "Er ging iets mis bij het updaten. Probeer opnieuw.";
    }
}
?>

<!doctype html>
<html lang="nl">
<head>
    <title>Table Time - Profiel bijwerken</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body { font: 14px sans-serif; }
        .wrapper { width: 360px; padding: 20px; margin: auto; margin-top: 50px; }
    </style>
</head>
<body>

<div class="wrapper">
    <h2>Restaurantgegevens bijwerken</h2>
    <p>Werk hier de gegevens van je restaurant bij.</p>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form action="restaurant_update.php" method="POST">
        <div class="form-group">
            <label>Restaurantnaam</label>
            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($restaurant['name']); ?>" required>
        </div>    
        <div class="form-group">
            <label>E-mail</label>
            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($restaurant['email']); ?>" required>
        </div>
        <div class="form-group">
            <label>Nieuw wachtwoord (leeg laten om niet te wijzigen)</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label>Locatie</label>
            <input type="text" name="location" class="form-control" value="<?= htmlspecialchars($restaurant['location']); ?>" required>
        </div>
        <div class="form-group">
            <label>Telefoonnummer</label>
            <input type="text" name="phone" class="form-control" value="<?= htmlspecialchars($restaurant['phone']); ?>">
        </div>
        <div class="form-group">
            <label>Capaciteit</label>
            <input type="number" name="capacity" class="form-control" value="<?= htmlspecialchars($restaurant['capacity']); ?>" required>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Opslaan">
            <a href="index.php" class="btn btn-danger">Annuleren</a>
        </div>
    </form>
</div>

</body>
</html>
