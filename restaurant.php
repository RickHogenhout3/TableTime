<?php
include "config.php";

$query = $connect->query("SELECT id, name, location, phone FROM restaurants");
$restaurants = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>Table Time - Restaurants</title>
    <style>
        .restaurant-card {
            display: flex;
            align-items: center;
            background: #fff;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
        }
        .restaurant-card img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 15px;
        }
        .restaurant-details {
            flex: 1;
        }
        .rating {
            color: #ff9800;
            font-weight: bold;
        }
        .delivery-info {
            font-size: 14px;
            color: #555;
        }
        .free-delivery {
            background: #ffc107;
            padding: 3px 8px;
            border-radius: 5px;
            font-size: 12px;
            color: #333;
        }
    </style>
</head>
<body>
<?php include_once "header.html"; ?>

<div class="container mt-4">
    <h2 class="mb-4">Bestel bij onze restaurants</h2>
    
    <?php foreach ($restaurants as $restaurant): ?>
        <div class="restaurant-card">
            <img src="<?= htmlspecialchars($restaurant['logo'] ?? 'placeholder.jpg') ?>" alt="<?= htmlspecialchars($restaurant['name']) ?>">
            <div class="restaurant-details">
                <h5><?= htmlspecialchars($restaurant['name']) ?></h5>
                <p class="delivery-info">
                    ⭐ <span class="rating"><?= rand(4, 5) ?>,<?= rand(0, 9) ?></span> (<?= rand(50, 300) ?>+) · 📍 <?= htmlspecialchars($restaurant['location']) ?><br>
                    🚴 <?= rand(20, 60) ?> min · 💰 Min. €<?= rand(35, 80) ?>
                </p>
                
                <br><br>
                <a href="menu.php?id=<?= $restaurant['id'] ?>" class="btn btn-primary btn-sm">Bekijk Menu</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>
