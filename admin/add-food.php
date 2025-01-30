<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 600px;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add New Product</h1>
        <form id="add-product-form">
            <div class="form-group">
                <label for="product-name">Product Name</label>
                <input type="text" class="form-control" id="product-name" required>
            </div>
            <div class="form-group">
                <label for="product-name">Product Description</label>
                <input type="text" class="form-control" id="product-description" required>
            </div>
            <div class="form-group">
                <label for="product-price">Price (€)</label>
                <input type="number" class="form-control" id="product-price" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="product-image">Image URL</label>
                <input type="text" class="form-control" id="product-image" required>
            </div>
            <button type="submit" class="btn btn-success">Add Product</button>
            <a href="index.php" class="btn btn-secondary">Back to Admin Panel</a>
        </form>
    </div>

    <script>
    document.getElementById('add-product-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Voorkom dat het formulier normaal wordt verzonden

        const name = document.getElementById('product-name').value;
        const price = parseFloat(document.getElementById('product-price').value);
        const image = document.getElementById('product-image').value;

        // Nieuwe product aanmaken
        const newProduct = {
            id: Date.now(), // Unieke ID op basis van tijd
            name: name,
            price: price,
            image: image
        };

        // Voeg het product toe aan localStorage
        addOrEditProduct(newProduct);

        alert('Product added successfully!');
        window.location.href = 'index.php';
    });

    function addOrEditProduct(product) {
        // Haal de huidige producten op uit localStorage
        const existingProducts = JSON.parse(localStorage.getItem('products')) || [];

        // Controleer of een nieuw product ID is opgegeven, anders toewijzen
        if (!product.id) {
            const highestId = existingProducts.reduce((max, p) => Math.max(max, parseInt(p.id)), 0);
            product.id = (highestId + 1).toString(); // Nieuwe ID toewijzen
        }

        // Kijk of het product al bestaat
        const existingProductIndex = existingProducts.findIndex(p => p.id === product.id);

        if (existingProductIndex > -1) {
            existingProducts[existingProductIndex] = product; // Update bestaand product
        } else {
            existingProducts.push(product); // Voeg nieuw product toe
        }

        // Sla de producten weer op in localStorage
        localStorage.setItem('products', JSON.stringify(existingProducts));
    }
    </script>
</body>
</html>
