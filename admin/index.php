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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #f8f9fa;
            border-bottom: 1px solid #ddd;
        }
        .admin-header h1 {
            margin: 0;
        }
        .admin-table {
            margin-top: 20px;
        }
        .toggle-buttons {
            padding: 10px;
        }

        .menu-button {
            color: black;
            font-weight: bold;
            background-color: rgb(133, 129, 129);
            border: 2px solid rgb(133, 129, 129);
        }

        .menu-button:hover {
            color: white;
            background-color: #E5AB0C;
            border: 2px solid #E5AB0C;
        }

        .menu-button:active {
            color: white !important;
            background-color: #E5AB0C !important;
            border: 2px solid #E5AB0C !important;
        }

        .reservation-button {
            color: black;
            font-weight: bold;
            background-color: rgb(133, 129, 129);
            border: 2px solid rgb(133, 129, 129);
        }

        .reservation-button:hover {
            color: white;
            background-color: #E5AB0C;
            border: 2px solid #E5AB0C;
        }

        .reservation-button:active {
            color: white !important;
            background-color: #E5AB0C !important;
            border: 2px solid #E5AB0C !important;
        }

        .btn-add-product {
            position: fixed; /* Gebruik fixed zodat het altijd zichtbaar is */
            bottom: 30px;
            right: 30px;
            border-radius: 50%;
            padding: 15px;
            font-size: 24px;
            background-color: #007bff;
            color: white;
            border: none;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .btn-add-product:hover {
            background-color: #0056b3; /* Donkerdere kleur bij hover */
            color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1>Welkom, <?= htmlspecialchars($_SESSION["restaurant_name"]); ?>!</h1>
        <a href="logout.php" class="btn btn-danger">Uitloggen</a>
        <a href="restaurant_update.php" class="btn btn-primary">Restaurant bijwerken</a>

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
            <th>Acties</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($reservations as $reservation): ?>
            <tr>
                <td><?= htmlspecialchars($reservation['email']); ?></td>
                <td><?= htmlspecialchars($reservation['phone']); ?></td>
                <td><?= htmlspecialchars($reservation['party_size']); ?></td>
                <td><?= htmlspecialchars($reservation['reservation_time']); ?></td>
                <td><?= htmlspecialchars($reservation['status']); ?></td>
                <td>
                    <?php if ($reservation['status'] === 'pending'): ?>
                        <a href="confirm_reservation.php?id=<?= $reservation['id']; ?>" 
                           class="btn btn-success btn-sm"
                           onclick="return confirm('Weet je zeker dat je deze reservering wilt bevestigen?');">
                           Bevestigen
                        </a>
                    <?php else: ?>
                        -
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
    </div>
</body>
</html>
