<!DOCTYPE html>
<html lang="en">
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
        <div class="admin-header">
            <h1>Admin Panel</h1>
        </div>

        <div class="toggle-buttons">
            <button id="toggle-products" class="menu-button btn btn-warning">Menu Items</button>
            <button id="toggle-orders" class="reservation-button btn btn-warning">Reservations</button>
        </div>

        <div id="product-table" class="admin-table">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Dish Name</th>
                        <th>Description</th>
                        <th>Price (€)</th>
                        <th>Image URL</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Mock data from menus table -->
                    <tr>
                        <td>Margherita Pizza</td>
                        <td>Classic pizza with fresh mozzarella, basil, and tomato sauce.</td>
                        <td>12.50</td>
                        <td><a href="https://example.com/images/margherita.jpg" target="_blank">View Image</a></td>
                        <td>
                            <button class="btn btn-primary btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Spaghetti Carbonara</td>
                        <td>Creamy pasta with pancetta, parmesan, and egg yolk.</td>
                        <td>14.00</td>
                        <td><a href="https://example.com/images/carbonara.jpg" target="_blank">View Image</a></td>
                        <td>
                            <button class="btn btn-primary btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Tiramisu</td>
                        <td>Traditional Italian dessert with mascarpone and espresso.</td>
                        <td>7.00</td>
                        <td><a href="https://example.com/images/tiramisu.jpg" target="_blank">View Image</a></td>
                        <td>
                            <button class="btn btn-primary btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div id="reservation-table" class="admin-table" style="display: none;">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Customer Email</th>
                        <th>Phone</th>
                        <th>Party Size</th>
                        <th>Reservation Time</th>
                        <th>Special Requests</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Mock data from reservations table -->
                    <tr>
                        <td>john.doe@example.com</td>
                        <td>+123456789</td>
                        <td>4</td>
                        <td>2024-12-06 19:30</td>
                        <td>Window seat if available.</td>
                        <td>Confirmed</td>
                    </tr>
                    <tr>
                        <td>jane.smith@example.com</td>
                        <td>+987654321</td>
                        <td>2</td>
                        <td>2024-12-07 18:00</td>
                        <td>None</td>
                        <td>Pending</td>
                    </tr>
                    <tr>
                        <td>alex.jones@example.com</td>
                        <td>+1122334455</td>
                        <td>6</td>
                        <td>2024-12-06 20:00</td>
                        <td>Birthday celebration setup.</td>
                        <td>Cancelled</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Add Product Button -->
        <a href="add-food.php">
         <button id="add-product-btn" class="btn btn-add-product" title="Add New Product">
            <i class="fas fa-plus"></i> <!-- Gebruik Font Awesome voor + icoon -->
        </button>
         </a>
    </div>

    <script>
        document.getElementById("toggle-products").addEventListener("click", function () {
            document.getElementById("product-table").style.display = "block";
            document.getElementById("reservation-table").style.display = "none";
        });

        document.getElementById("toggle-orders").addEventListener("click", function () {
            document.getElementById("product-table").style.display = "none";
            document.getElementById("reservation-table").style.display = "block";
        });
    </script>
</body>
</html>
