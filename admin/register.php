<?php
include_once "../config.php"; // Databaseverbinding

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Wachtwoord hashen
    $location = trim($_POST["location"]);
    $phone = trim($_POST["phone"]);
    $capacity = intval($_POST["capacity"]);

    // Controleer of het e-mailadres al bestaat
    $checkQuery = $connect->prepare("SELECT id FROM restaurants WHERE email = ?");
    $checkQuery->execute([$email]);
    
    if ($checkQuery->rowCount() > 0) {
        $error = "Dit e-mailadres is al in gebruik.";
    } else {
        // Voeg restaurant toe aan database
        $sql = "INSERT INTO restaurants (name, email, password, location, phone, capacity, created_at, updated_at) 
                VALUES (?, ?, ?, ?, ?, ?, NOW(), NOW())";
        $stmt = $connect->prepare($sql);

        if ($stmt->execute([$name, $email, $password, $location, $phone, $capacity])) {
            header("Location: restaurant-login.php?success=1");
            exit();
        } else {
            $error = "Er ging iets mis. Probeer het opnieuw.";
        }
    }
}
?>

<!doctype html>
<html lang="nl">
<head>
    <title>Table Time - Registreren</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body { font: 14px sans-serif; }
        .wrapper { width: 360px; padding: 20px; margin: auto; margin-top: 50px; }
    </style>
</head>
<body>

<div class="wrapper">
    <h2>Registreren</h2>
    <p>Vul onderstaande gegevens in om uw restaurant aan te maken.</p>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form action="register.php" method="POST">
        <div class="form-group">
            <label>Restaurantnaam</label>
            <input type="text" name="name" class="form-control" required>
        </div>    
        <div class="form-group">
            <label>E-mail</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Wachtwoord</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Locatie</label>
            <input type="text" name="location" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Telefoonnummer</label>
            <input type="text" name="phone" class="form-control">
        </div>
        <div class="form-group">
            <label>Capaciteit</label>
            <input type="number" name="capacity" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Registreren">
            <a href="restaurant-login.php" class="btn btn-danger">Terug</a>
        </div>
    </form>
</div>

</body>
</html>
