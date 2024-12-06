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

        .reservation-button.btn-secondary:active {
            color: white !important;
            background-color: #E5AB0C !important;
            border: 2px solid #E5AB0C !important;
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
        </div>
</body>
</html>