<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Time</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
</head>
<body>
    <?php include 'header.html'; ?>

    <div class="container mt-4 d-flex">
        <!-- Zijbalk filters -->
        <aside class="me-4" style="width: 250px;">
            <h4>Filters</h4>
            <label><input type="checkbox"> Nu geopend</label><br>
            <label><input type="checkbox"> Nieuw</label><br>
            <h5 class="mt-3">Minimum bestelbedrag</h5>
            <label><input type="radio" name="min-price"> €10 of minder</label><br>
            <label><input type="radio" name="min-price"> €15 of minder</label><br>
        </aside>

        <!-- Restaurant lijst/grid -->
        <main class="flex-grow-1">
            <h3>Populaire merken</h3>
            <div class="d-flex overflow-auto">
                <div class="card me-3" style="width: 200px;">
                    <img src="https://via.placeholder.com/200" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">FEBO Purmerend Koestraat</h5>
                        <p>4.5 ⭐ - Snacks, Burgers</p>
                    </div>
                </div>
                <div class="card me-3" style="width: 200px;">
                    <img src="https://via.placeholder.com/200" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Subway Purmerend</h5>
                        <p>3.4 ⭐ - Lunch, Amerikaans</p>
                    </div>
                </div>
            </div>
            <h3 class="mt-4">Alle restaurants</h3>
            <div class="list-group">
                <div class="list-group-item d-flex">
                    <img src="https://via.placeholder.com/100" class="me-3">
                    <div>
                        <h5>Gochu Gang - Korean Fried Chicken</h5>
                        <p>3.8 ⭐ - Burgers, Aziatisch</p>
                    </div>
                </div>
                <div class="list-group-item d-flex">
                    <img src="https://via.placeholder.com/100" class="me-3">
                    <div>
                        <h5>Karaage Kid - Japanese Fried Chicken</h5>
                        <p>4.3 ⭐ - Aziatisch, Kip</p>
                    </div>
                </div>
                <div class="list-group-item d-flex">
                    <img src="https://via.placeholder.com/100" class="me-3">
                    <div>
                        <h5>Subway</h5>
                        <p>3.4 ⭐ - Lunch, Amerikaans</p>
                    </div>
                </div>
                <div class="list-group-item d-flex">
                    <img src="https://via.placeholder.com/100" class="me-3">
                    <div>
                        <h5>FEBO Purmerend Koestraat</h5>
                        <p>4.5 ⭐ - Snacks, Burgers</p>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
