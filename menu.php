<?php
include "config.php"; // Databaseverbinding

if (!isset($_GET['id'])) {
    die("Geen restaurant geselecteerd.");
}

$restaurant_id = $_GET['id'];

$stmt = $connect->prepare("SELECT name FROM restaurants WHERE id = ?");
$stmt->execute([$restaurant_id]);
$restaurant = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$restaurant) {
    die("Restaurant niet gevonden.");
}

// Definieer de juiste categorieën in volgorde
$categories = ["Lunch", "Dinner", "Desserts", "Drinks"];


$query = $connect->prepare("SELECT * FROM menus WHERE restaurant_id = ? ORDER BY is_special DESC, name");
$query->execute([$restaurant_id]);
$menu_items = $query->fetchAll(PDO::FETCH_ASSOC);

// Sorteer de menu-items in de correcte categorieën
$categorized_menu = array_fill_keys($categories, []);
foreach ($menu_items as $item) {
    if (in_array($item['dish'], $categories)) {
        $categorized_menu[$item['dish']][] = $item;
    }
}

// Verwijder categorieën die geen items bevatten
$categorized_menu = array_filter($categorized_menu);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Menu - <?= htmlspecialchars($restaurant['name']) ?></title>
    <style>
        .menu-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        .menu-card .price {
            font-size: 1.2rem;
            font-weight: bold;
        }
        .menu-card img {
            width: 100px;
            height: auto;
            border-radius: 5px;
        }
        .special {
            position: absolute;
            top: -10px;
            right: -10px;
            background: gold;
            color: black;
            padding: 5px 10px;
            font-size: 14px;
            font-weight: bold;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<?php include_once "header.html"; ?>

<div class="container my-4">
    <h1 class="text-center mb-4"><?= htmlspecialchars($restaurant['name']) ?> - Menu</h1>

<!-- Tabs in het midden + reserveerknop rechts -->
<div class="position-relative my-4">
    <!-- Tabs gecentreerd -->
    <ul class="nav nav-tabs justify-content-center">
        <?php $first = true; ?>
        <?php foreach ($categories as $category): ?>
            <?php if (!empty($categorized_menu[$category])): ?>
                <li class="nav-item">
                    <button class="nav-link <?= $first ? 'active' : '' ?>"
                            data-bs-toggle="tab"
                            data-bs-target="#<?= strtolower($category) ?>">
                        <?= htmlspecialchars($category) ?>
                    </button>
                </li>
                <?php $first = false; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>

    <!-- Reserveerknop rechts -->
    <a href="reservering.php?id=<?= $restaurant_id ?>" 
       class="btn btn-warning position-absolute" 
       style="right: 0; top: 0;">
       Reserveer nu
    </a>
</div>


    <!-- Menu Items per Dish Category -->
    <div class="tab-content">
        <?php $first = true; ?>
        <?php foreach ($categories as $category): ?>
            <?php if (!empty($categorized_menu[$category])): ?>
                <div class="tab-pane fade <?= $first ? 'show active' : '' ?>"
                     id="<?= strtolower($category) ?>">
                    <?php foreach ($categorized_menu[$category] as $item): ?>
                        <div class="menu-card">
                            <?php if ($item['is_special']): ?>
                                <span class="special">Special</span>
                            <?php endif; ?>
                            <h5><?= htmlspecialchars($item['name']) ?></h5>
                            <p><?= htmlspecialchars($item['description']) ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">€<?= number_format($item['price'], 2) ?></span>
                                <img src="<?= htmlspecialchars($item['image'] ?? 'placeholder.jpg') ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="img-fluid">
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php $first = false; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
