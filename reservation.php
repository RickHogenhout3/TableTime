<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<header class="header-content">
        <h2 class="logo">
            Table Time
        </h2>
        <form class="search-bar" action="#" method="GET">
            <input type="text" placeholder="Search..." name="search">
            <button type="submit" aria-label="Search">
                <i class="bi bi-search"></i>
            </button>
        </form>
        <nav class="sitemap">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="#about">Restaurants</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>

<svg width="75%" height="auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 700 500" style="background: #f8f8f8;">
    <!-- Circular Tables -->
    <circle id="table1" cx="100" cy="100" r="40" fill="#D9D9D9" data-capacity="4" />
    <text x="100" y="95" fill="black" font-size="12" text-anchor="middle">1</text>
    <text x="100" y="115" fill="black" font-size="10" text-anchor="middle">4 seats</text>

    <circle id="table2" cx="250" cy="100" r="40" fill="#D9D9D9" data-capacity="4" />
    <text x="250" y="95" fill="black" font-size="12" text-anchor="middle">2</text>
    <text x="250" y="115" fill="black" font-size="10" text-anchor="middle">4 seats</text>

    <circle id="table3" cx="400" cy="100" r="40" fill="#D9D9D9" data-capacity="4" />
    <text x="400" y="95" fill="black" font-size="12" text-anchor="middle">3</text>
    <text x="400" y="115" fill="black" font-size="10" text-anchor="middle">4 seats</text>

    <!-- Square Tables -->
    <rect id="table4" x="100" y="200" width="80" height="80" fill="#D9D9D9" data-capacity="4" />
    <text x="140" y="235" fill="black" font-size="12" text-anchor="middle">4</text>
    <text x="140" y="255" fill="black" font-size="10" text-anchor="middle">4 seats</text>

    <rect id="table5" x="250" y="200" width="80" height="80" fill="#D9D9D9" data-capacity="4" />
    <text x="290" y="235" fill="black" font-size="12" text-anchor="middle">5</text>
    <text x="290" y="255" fill="black" font-size="10" text-anchor="middle">4 seats</text>

    <rect id="table6" x="400" y="200" width="80" height="80" fill="#D9D9D9" data-capacity="4" />
    <text x="440" y="235" fill="black" font-size="12" text-anchor="middle">6</text>
    <text x="440" y="255" fill="black" font-size="10" text-anchor="middle">4 seats</text>

    <!-- Rectangular Tables -->
    <rect id="table7" x="100" y="350" width="120" height="60" fill="#D9D9D9" data-capacity="6" />
    <text x="160" y="375" fill="black" font-size="12" text-anchor="middle">7</text>
    <text x="160" y="395" fill="black" font-size="10" text-anchor="middle">6 seats</text>

    <rect id="table8" x="250" y="350" width="120" height="60" fill="#D9D9D9" data-capacity="6" />
    <text x="310" y="375" fill="black" font-size="12" text-anchor="middle">8</text>
    <text x="310" y="395" fill="black" font-size="10" text-anchor="middle">6 seats</text>

    <rect id="table9" x="400" y="350" width="120" height="60" fill="#D9D9D9" data-capacity="6" />
    <text x="460" y="375" fill="black" font-size="12" text-anchor="middle">9</text>
    <text x="460" y="395" fill="black" font-size="10" text-anchor="middle">6 seats</text>

    <!-- Large Round Tables for Groups -->
    <circle id="table10" cx="600" cy="150" r="60" fill="#D9D9D9" data-capacity="8" />
    <text x="600" y="145" fill="black" font-size="12" text-anchor="middle">10</text>
    <text x="600" y="165" fill="black" font-size="10" text-anchor="middle">8 seats</text>

    <circle id="table11" cx="600" cy="350" r="60" fill="#D9D9D9" data-capacity="8" />
    <text x="600" y="345" fill="black" font-size="12" text-anchor="middle">11</text>
    <text x="600" y="365" fill="black" font-size="10" text-anchor="middle">8 seats</text>
</svg>
</body>
</html>