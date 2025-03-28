<?php
include_once "../config.php"; // Zorg ervoor dat de verbinding correct wordt ingeladen

if (!isset($_SESSION["restaurant_id"])) {
    header("Location: restaurant-login.php");
    exit();
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $restaurant_id = $_SESSION['restaurant_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $dish = $_POST['dish'];
    $is_special = isset($_POST['is_special']) ? 1 : 0;
    
    // Controleer of een afbeelding is toegevoegd, anders NULL gebruiken
    $dish_image = !empty($_POST['dish_image']) ? $_POST['dish_image'] : null;

    try {
        // Gebruik de correcte databaseverbinding ($connect in plaats van $conn)
        $stmt = $connect->prepare("INSERT INTO menus (restaurant_id, name, description, price, dish, is_special, dish_image, created_at, updated_at) 
                                   VALUES (:restaurant_id, :name, :description, :price, :dish, :is_special, :dish_image, NOW(), NOW())");
        $stmt->bindParam(':restaurant_id', $restaurant_id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':price', $price, PDO::PARAM_STR);
        $stmt->bindParam(':dish', $dish, PDO::PARAM_STR);
        $stmt->bindParam(':is_special', $is_special, PDO::PARAM_INT);
        $stmt->bindParam(':dish_image', $dish_image, PDO::PARAM_STR | PDO::PARAM_NULL);
        
        $stmt->execute();

        // Redirect naar index.php na succesvolle invoer
        header("Location: index.php");
        exit();
    } catch (PDOException $error) {
        $message = "Fout bij toevoegen menu-item: " . $error->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voeg nieuw menu-item toe</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Nieuw menu-item toevoegen</h2>
        <?php if ($message): ?>
            <div class="alert alert-danger"><?php echo $message; ?></div>
        <?php endif; ?>
        <form method="POST">
            <div class="form-group">
                <label for="name">Naam van het gerecht:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="description">Beschrijving:</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>

            <div class="form-group">
                <label for="price">Prijs (€):</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" required>
            </div>

            <div class="form-group">
    <label for="dish">Type gerecht:</label>
    <select class="form-control" id="dish" name="dish" required>
        <option value="" disabled selected>Kies een type gerecht</option>
        <option value="Lunch">Lunch</option>
        <option value="Dinner">Dinner</option>
        <option value="Desserts">Desserts</option>
        <option value="Drinks">Drinks</option>
    </select>
</div>


            <div class="form-group">
                <label for="dish_image">Afbeeldings-URL:</label>
                <input type="url" class="form-control" id="dish_image" name="dish_image">
            </div>

            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="is_special" name="is_special">
                <label class="form-check-label" for="is_special">Markeer als specialiteit</label>
            </div>

            <button type="submit" class="btn btn-primary">Toevoegen</button>
            <a href="index.php" class="btn btn-secondary">Annuleren</a>
        </form>
    </div>
</body>
</html>
