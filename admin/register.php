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
        <h2 class="text-center">Register Your Restaurant</h2>
        <form action="register.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <div>
                    <label for="name">Restaurant Name:</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
            </div>
            
            <div class="form-group">
                <div>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <div>
                    <label for="location">Location:</label>
                    <input type="text" id="location" name="location" class="form-control" required>
                </div>
            </div>
            
            <div class="form-group">
                <div>
                    <label for="phone">Phone:</label>
                    <input type="text" id="phone" name="phone" class="form-control">
                </div>
                <div>
                    <label for="capacity">Capacity:</label>
                    <input type="number" id="capacity" name="capacity" class="form-control" required>
                </div>
            </div>
            
            <div class="form-group">
                <div class="w-100">
                    <label for="logo">Logo (optional):</label>
                    <input type="file" id="logo" name="logo" class="form-control-file" accept="image/*">
                </div>
            </div>
            
            <div class="form-group">
                <div class="w-100">
                    <label for="header">Header Image (optional):</label>
                    <input type="file" id="header" name="header" class="form-control-file" accept="image/*">
                </div>
            </div>
            
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
