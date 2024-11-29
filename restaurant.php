<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <title>Table Time</title>
    <style>
        #map {
            padding: 20px;
            width: 25%;
            height: 350px;
        }
    </style>
</head>
<body>
    <header class="header-content">
        <h2 class="logo">Table Time</h2>
        <form class="search-bar" action="#" method="GET">
            <input type="text" placeholder="Search..." name="search">
            <button type="submit" aria-label="Search">
                <i class="bi bi-search"></i>
            </button>
        </form>
        <nav class="sitemap">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="restaurant.php">Restaurants</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>
    <div class="Table">
        <div class="gradient">
            <h1>Restaurant naam</h1>
            <h5>The easy dining experience</h5>
        </div>
    </div>

    <!-- Menu Section -->
    <div class="menu-section">
        <h2>Our Menu</h2>
        <div class="menu-categories">
            <button class="active" data-category="lunch">Lunch</button>
            <button data-category="dinner">Dinner</button>
            <button data-category="drinks">Drinks</button>
            <button data-category="desserts">Desserts</button>
        </div>

        <!-- Lunch Menu -->
        <div class="menu-items active" id="lunch">
            <ul>
                <li><span>Grilled Cheese Sandwich:</span> Served with a side of fries. (€5.99)</li>
                <li><span>Caesar Salad:</span> Fresh greens with grilled chicken and parmesan. (€7.99)</li>
                <li><span>Soup of the Day:</span> Ask your server for today's special. (€4.99)</li>
            </ul>
        </div>

        <!-- Dinner Menu -->
        <div class="menu-items" id="dinner">
            <ul>
                <li><span>Steak & Potatoes:</span> Juicy steak with mashed potatoes and green beans. (€19.99)</li>
                <li><span>Spaghetti Bolognese:</span> Traditional pasta with a rich meat sauce. (€14.99)</li>
                <li><span>Vegetarian Stir-fry:</span> Seasonal vegetables with a soy-based sauce. (€12.99)</li>
            </ul>
        </div>

        <!-- Drinks Menu -->
        <div class="menu-items" id="drinks">
            <ul>
                <li><span>Cappuccino:</span> Freshly brewed coffee with steamed milk. (€2.99)</li>
                <li><span>House Red Wine:</span> A smooth blend, perfect with dinner. (€5.50)</li>
                <li><span>Craft Beer:</span> Locally brewed, light and refreshing. (€4.50)</li>
            </ul>
        </div>

        <!-- Desserts Menu -->
        <div class="menu-items" id="desserts">
            <ul>
                <li><span>Chocolate Lava Cake:</span> Warm chocolate cake with a gooey center. (€6.99)</li>
                <li><span>Cheesecake:</span> Classic New York-style cheesecake. (€5.99)</li>
                <li><span>Ice Cream Trio:</span> Choose three scoops from our daily selection. (€4.99)</li>
            </ul>
        </div>
    </div>

    <!-- Leaflet Map -->
    <div id="map"></div>

    
    <script>
        // Menu Interaction
        const categoryButtons = document.querySelectorAll('.menu-categories button');
        const menuItems = document.querySelectorAll('.menu-items');

        categoryButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Remove active class from all buttons
                categoryButtons.forEach(btn => btn.classList.remove('active'));
                // Add active class to the clicked button
                button.classList.add('active');

                // Hide all menu items
                menuItems.forEach(menu => menu.classList.remove('active'));
                // Show the clicked category's menu
                document.getElementById(button.getAttribute('data-category')).classList.add('active');
            });
        });

        const restaurantCoordinates = [52.5042226, 4.9482444]; // Example coordinates
        const map = L.map('map').setView(restaurantCoordinates, 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { maxZoom: 19 }).addTo(map);
        L.marker(restaurantCoordinates).addTo(map)
            .bindPopup('<b>Restaurant Naam</b><br>The easy dining experience.')
            .openPopup();
    </script>
</body>
</html>