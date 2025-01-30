<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Restaurant Registration</title>
    <style>
        body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f8f9fa;
}
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Login to Your Restaurant</h2>
        <form action="register.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <div>
                    <label for="name">Restaurant Name or Email:</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
            </div>
            
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
