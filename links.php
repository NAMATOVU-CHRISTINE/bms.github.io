<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bms</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>

    </style>
    <script>
        function toggleMenu() {
            const navUl = document.querySelector('nav ul');
            navUl.classList.toggle('show');
        }
    </script>
</head>
<body>
    <nav>
        <div class="container">
            <span class="menu-icon" onclick="toggleMenu()">☰</span>
            <ul>
<li><a href="index.php">Home</a></li>
<li><a href="about.php">About Us</a></li>
<li><a href="notifications.php">Notifications</a></li>
<li><a href="real-time-tracking.php">Real-Time Tracking</a></li>
<li><a href="terms.php">Terms of Service</a></li>
<li><a href="help.php">Help</a></li>

            </ul>
        </div>
    </nav>
</body>
</html>