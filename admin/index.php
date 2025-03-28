<?php
include_once "../config.php";

if (!isset($_SESSION["restaurant_id"])) {
    header("Location: restaurant-login.php");
    exit();
}

$restaurant_id = $_SESSION["restaurant_id"];

$queryMenu = "SELECT * FROM menus WHERE restaurant_id = ?";
$stmtMenu = $connect->prepare($queryMenu);
$stmtMenu->execute([$restaurant_id]);
$menuItems = $stmtMenu->fetchAll();

// Haal reserveringen op voor het ingelogde restaurant
$queryReservations = "SELECT * FROM reservations WHERE restaurant_id = ?";
$stmtReservations = $connect->prepare($queryReservations);
$stmtReservations->execute([$restaurant_id]);
$reservations = $stmtReservations->fetchAll();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Time - Admin Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Welkom, <?= htmlspecialchars($_SESSION["restaurant_name"]); ?>!</h1>
        <a href="logout.php" class="btn btn-danger">Uitloggen</a>

        <h2>Jouw Menu Items</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Beschrijving</th>
                    <th>Prijs (€)</th>
                    <th>Afbeelding</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($menuItems as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['name']); ?></td>
                        <td><?= htmlspecialchars($item['description']); ?></td>
                        <td><?= number_format($item['price'], 2, ',', '.'); ?></td>
                        <td> <?= !empty($item['image_url']) ? '<img src="' . htmlspecialchars($item['image_url']) . '" width="50">' : ''; ?> </td>
                        <td>
                            <a href="edit_menu.php?id=<?= $item['id']; ?>" class="btn btn-primary btn-sm">Bewerk</a>
                            <a href="delete_menu.php?id=<?= $item['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Weet je zeker dat je dit wilt verwijderen?');">Verwijder</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="menu.php" class="btn btn-success">Nieuw menu-item toevoegen</a>

        <h2>Jouw Reserveringen</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Klant E-mail</th>
                    <th>Telefoon</th>
                    <th>Aantal personen</th>
                    <th>Datum en Tijd</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservations as $reservation): ?>
                    <tr>
                        <td><?= htmlspecialchars($reservation['customer_email']); ?></td>
                        <td><?= htmlspecialchars($reservation['phone']); ?></td>
                        <td><?= htmlspecialchars($reservation['party_size']); ?></td>
                        <td><?= htmlspecialchars($reservation['reservation_time']); ?></td>
                        <td><?= htmlspecialchars($reservation['status']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
