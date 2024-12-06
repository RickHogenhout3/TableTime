<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <title>Table Time</title>
    <style>
        #map {
            margin-top: 20px;
            width: 100%;
            height: 350px;
        }
        .menu-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .menu-card h5 {
            margin: 0;
        }
        .menu-card .price {
            font-size: 1.2rem;
            font-weight: bold;
        }
        .nav-tabs .nav-link {
            margin: 0 5px;
        }
        .menu-card img {
            width: 100px;
            height: auto;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<?php include_once "header.html" ?>

    <div class="container my-4">
        <h1 class="text-center mb-4">Restaurant Naam</h1>

        <!-- Tabs for Menu Categories -->
        <ul class="nav nav-tabs justify-content-center my-4" id="menuTabs" role="tablist">
            <li class="nav-item">
                <button class="nav-link active" id="lunch-tab" data-bs-toggle="tab" data-bs-target="#lunch" type="button" role="tab">Lunch</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" id="dinner-tab" data-bs-toggle="tab" data-bs-target="#dinner" type="button" role="tab">Dinner</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" id="drinks-tab" data-bs-toggle="tab" data-bs-target="#drinks" type="button" role="tab">Drinks</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" id="desserts-tab" data-bs-toggle="tab" data-bs-target="#desserts" type="button" role="tab">Desserts</button>
            </li>
        </ul>

        <!-- Menu Items -->
        <div class="tab-content">
            <!-- Lunch -->
            <div class="tab-pane fade show active" id="lunch" role="tabpanel">
                <div class="menu-card">
                    <h5>Grilled Cheese Sandwich</h5>
                    <p>Served with a side of fries.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="price">€5.99</span>
                        <img src="path/to/grilled-cheese.jpg" alt="Grilled Cheese Sandwich" class="img-fluid">
                    </div>
                </div>
                <div class="menu-card">
                    <h5>Caesar Salad</h5>
                    <p>Fresh greens with grilled chicken and parmesan.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="price">€7.99</span>
                        <img src="path/to/caesar-salad.jpg" alt="Caesar Salad" class="img-fluid">
                    </div>
                </div>
                <div class="menu-card">
                    <h5>Soup of the Day</h5>
                    <p>Ask your server for today's special.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="price">€4.99</span>
                        <img src="path/to/soup-of-the-day.jpg" alt="Soup of the Day" class="img-fluid">
                    </div>
                </div>
            </div>

            <!-- Dinner -->
            <div class="tab-pane fade" id="dinner" role="tabpanel">
                <div class="menu-card">
                    <h5>Steak & Potatoes</h5>
                    <p>Juicy steak with mashed potatoes and green beans.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="price">€19.99</span>
                        <img src="path/to/steak-potatoes.jpg" alt="Steak & Potatoes" class="img-fluid">
                    </div>
                </div>
            </div>

            <!-- Drinks -->
            <div class="tab-pane fade" id="drinks" role="tabpanel">
                <div class="menu-card">
                    <h5>Cappuccino</h5>
                    <p>Freshly brewed coffee with steamed milk.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="price">€2.99</span>
                        <img src="path/to/cappuccino.jpg" alt="Cappuccino" class="img-fluid">
                    </div>
                </div>
            </div>

            <!-- Desserts -->
            <div class="tab-pane fade" id="desserts" role="tabpanel">
                <div class="menu-card">
                    <h5>Chocolate Lava Cake</h5>
                    <p>Warm chocolate cake with a gooey center.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="price">€6.99</span>
                        <img src="path/to/chocolate-lava-cake.jpg" alt="Chocolate Lava Cake" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Map -->
    <div id="map"></div>

    <script>
        // Leaflet Map Setup
        const restaurantCoordinates = [52.5042226, 4.9482444];
        const map = L.map('map').setView(restaurantCoordinates, 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { maxZoom: 19 }).addTo(map);
        L.marker(restaurantCoordinates).addTo(map)
            .bindPopup('<b>Restaurant Naam</b><br>The easy dining experience.')
            .openPopup();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>