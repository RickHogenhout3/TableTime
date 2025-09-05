<?php
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
$message = "";

// Fetch existing menu item data
try {
    $stmt = $connect->prepare("SELECT * FROM menus WHERE id = :id AND restaurant_id = :restaurant_id");
    $stmt->bindParam(':id', $menu_id, PDO::PARAM_INT);
    $stmt->bindParam(':restaurant_id', $restaurant_id, PDO::PARAM_INT);
    $stmt->execute();
    $menu_item = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$menu_item) {
        header("Location: index.php");
        exit();
    }
} catch (PDOException $error) {
    $message = "Error fetching menu item: " . $error->getMessage();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $dish = $_POST['dish'];
    $is_special = isset($_POST['is_special']) ? 1 : 0;
    $dish_image = !empty($_POST['dish_image']) ? $_POST['dish_image'] : null;

    try {
        $stmt = $connect->prepare("UPDATE menus SET name = :name, description = :description, price = :price, 
                                  dish = :dish, is_special = :is_special, dish_image = :dish_image, updated_at = NOW() 
                                  WHERE id = :id AND restaurant_id = :restaurant_id");
        $stmt->bindParam(':id', $menu_id, PDO::PARAM_INT);
        $stmt->bindParam(':restaurant_id', $restaurant_id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':price', $price, PDO::PARAM_STR);
        $stmt->bindParam(':dish', $dish, PDO::PARAM_STR);
        $stmt->bindParam(':is_special', $is_special, PDO::PARAM_INT);
        $stmt->bindParam(':dish_image', $dish_image, PDO::PARAM_STR | PDO::PARAM_NULL);
        
        $stmt->execute();

        header("Location: index.php");
        exit();
    } catch (PDOException $error) {
        $message = "Error updating menu item: " . $error->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu Item</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Edit Menu Item</h2>
        <?php if ($message): ?>
            <div class="alert alert-danger"><?= $message ?></div>
        <?php endif; ?>
        <form method="POST">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" value="<?= htmlspecialchars($menu_item['name']) ?>" required class="form-control">
            </div>
            <div class="form-group">
                <label>Description:</label>
                <textarea name="description" class="form-control" required><?= htmlspecialchars($menu_item['description']) ?></textarea>
            </div>
            <div class="form-group">
                <label>Price (€):</label>
                <input type="text" name="price" value="<?= htmlspecialchars($menu_item['price']) ?>" required class="form-control">
            </div>
            <div class="form-group">
    <label for="dish">Dish Category:</label>
    <select class="form-control" id="dish" name="dish" required>
        <option value="" disabled>Kies een type gerecht</option>
        <option value="Lunch" <?= $menu_item['dish'] == 'Lunch' ? 'selected' : '' ?>>Lunch</option>
        <option value="Dinner" <?= $menu_item['dish'] == 'Dinner' ? 'selected' : '' ?>>Dinner</option>
        <option value="Desserts" <?= $menu_item['dish'] == 'Desserts' ? 'selected' : '' ?>>Desserts</option>
        <option value="Drinks" <?= $menu_item['dish'] == 'Drinks' ? 'selected' : '' ?>>Drinks</option>
    </select>
</div>
            <div class="form-group">
                <label>Dish Image URL:</label>
                <input type="text" name="dish_image" value="<?= htmlspecialchars($menu_item['dish_image']) ?>" class="form-control">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" name="is_special" class="form-check-input" <?= $menu_item['is_special'] ? 'checked' : '' ?>>
                <label class="form-check-label">Mark as Special</label>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
