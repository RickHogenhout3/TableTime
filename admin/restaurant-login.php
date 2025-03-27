<?php
include_once "../config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (empty($email) || empty($password)) {
        $message = "Vul alle velden in.";
    } else {
        $query = "SELECT id, name, password FROM restaurants WHERE email = ?";
        $statement = $connect->prepare($query);
        $statement->execute([$email]);
        $restaurant = $statement->fetch(PDO::FETCH_ASSOC);

        if ($restaurant) {
            if (password_verify($password, $restaurant["password"])) {
                $_SESSION["restaurant_id"] = $restaurant["id"];
                $_SESSION["restaurant_name"] = $restaurant["name"];

                header("Location: index.php");
                exit();
            } else {
                $message = "Onjuiste inloggegevens.";
            }
        } else {
            $message = "Geen account gevonden met dit e-mailadres.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Table Time - Inloggen</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body { font: 14px sans-serif; }
        .wrapper { width: 360px; padding: 20px; margin: auto; margin-top: 50px; }
    </style>
</head>
<body>

<div class="wrapper">
    <h2>Inloggen</h2>
    <p>Voer je gegevens in om in te loggen.</p>

    <?php if (isset($message)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <form action="restaurant-login.php" method="POST">
        <div class="form-group">
            <label>E-mail</label>
            <input type="email" name="email" class="form-control" required>
        </div>    
        <div class="form-group">
            <label>Wachtwoord</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Login">
            <a href="register.php" class="btn btn-secondary">Registreer</a>
        </div>
    </form>
</div>

</body>
</html>
