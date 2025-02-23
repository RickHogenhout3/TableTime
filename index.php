<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <title>Table Time</title>
</head>
<body>
    <?php include_once "header.html" ?>
    <div class="Table">
        <div class="gradient">
            <h1>Welcome to Table Time</h1>
        </div>
    </div>

    <div class="about">
        <div class="text">
            <h2>Effortless Dining with Table Time</h2>
            <p>At Table Time, we partner with a wide variety of top restaurants, ensuring you always have the perfect dining option at your fingertips.
                whether it's a romantic dinner, a business lunch, or a casual gathering. With our easy-to-use platform, you can make reservations in just a few clicks, choosing your desired time and date without the hassle.
                Plus, our real-time availability feature ensures you know exactly when a table is free, so you can book with confidence, knowing your reservation is confirmed immediately. It’s quick, simple, and stress-free – just the way booking a meal should be
            </p>
        </div>
        <div class="image-container">
            <img src="img/Restaurant.jpg" alt="About Section Image">
            <div class="button-text-container">
                <span class="additional-text">Book your table now for a great dining experience!</span>
                <button class="reservation-btn">Make Reservation</button>
            </div>
        </div>
    </div>

    <div class="Restaurant">
        <div class="reserv-container">
            <img src="img/Restaurant.jpg" alt="About Section Image">
            <div class="button-text-container">
                <span class="additional-text">Book your table now for a great dining experience!</span>
                <button class="reservation-btn">Make Reservation</button>
            </div>
        </div>
        <div class="text">
            <h2>Mock</h2>
            <p>Magna suscipit in non tempor arcu aenean praesent netus molestie. 
            Curabitur fermentum dapibus mi venenatis aliquam non ornare. 
            Maximus elit mattis facilisis fusce eros. Sem conubia sed feugiat sollicitudin cras nibh est magnis? Hac purus torquent fames duis interdum. Mauris congue efficitur mattis turpis mauris tristique. Maximus potenti laoreet augue malesuada, tincidunt integer facilisi. Ex eu class porta lacus pretium vulputate.
            Nunc ad vestibulum consectetur scelerisque urna.
            Donec elit sodales volutpat ante potenti tempus porta libero egestas.
            Adipiscing lacinia ligula eu, tristique lacinia ex. Dui orci morbi sem, non elementum dui posuere interdum. Himenaeos bibendum vestibulum eget ligula praesent cras morbi fringilla mus. Fermentum iaculis velit curabitur arcu vestibulum faucibus auctor porta. Interdum pharetra maecenas; accumsan libero non cras.
            Curae congue commodo accumsan porta eleifend placerat class lobortis pulvinar.
            </p>
        </div>
    </div>

    <div class="form-container">
        <div class="form-content">
            <form>
                <h2>Subscribe to our newsletter for great sales</h2>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lastname">Lastname</label>
                        <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Lastname">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                </div>
                <div class="form-row checkbox-row">
                    <div class="form-group">
                        <label for="checkbox">
                            Subscribe to newsletter
                            <input type="checkbox" name="check" id="check">
                        </label>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Send" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
        <div class="form-image">
            <img src="img/cute-cartoon-chef.png" alt="Image" class="image">
        </div>
    </div>    
</body>
</html>
