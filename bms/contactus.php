<?php
// Start session if needed
session_start();

// Include database connection or email handling script if required
// include 'database.php'; // Uncomment if saving to database
// include 'email_handler.php'; // Uncomment if sending an email

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['contactName'];
    $email = $_POST['contactEmail'];
    $subject = $_POST['contactSubject'];
    $message = $_POST['contactMessage'];
    
    // Option 1: Save to database
    // $sql = "INSERT INTO contacts (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
    // mysqli_query($conn, $sql); // Uncomment if using a database

    // Option 2: Send email
    // $to = "youremail@example.com";
    // $headers = "From: $email";
    // mail($to, $subject, $message, $headers);

    $success_message = "Thank you for contacting us! We'll get back to you soon.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Bus Management System</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Header Section -->
    <header class="bg-light p-3">
        <div class="container d-flex align-items-center">
            <img src="Images/buslogo.jpeg" alt="Bus Management System Logo" class="logo">
            <h1 class="ml-3">Contact Us</h1>
        </div>
    </header>

    <!-- Navigation Bar -->
    <nav>
        <?php include 'links.php'; ?>
    </nav>

    <!-- Contact Form Section -->
    <div class="container mt-4">
        <h2>Get in Touch</h2>
        <?php if (isset($success_message)): ?>
            <div class="alert alert-success">
                <?php echo $success_message; ?>
            </div>
        <?php endif; ?>

        <form action="contact.php" method="post">
            <div class="form-group">
                <label for="contactName">Name</label>
                <input type="text" class="form-control" id="contactName" name="contactName" required>
            </div>
            <div class="form-group">
                <label for="contactEmail">Email</label>
                <input type="email" class="form-control" id="contactEmail" name="contactEmail" required>
            </div>
            <div class="form-group">
                <label for="contactSubject">Subject</label>
                <input type="text" class="form-control" id="contactSubject" name="contactSubject" required>
            </div>
            <div class="form-group">
                <label for="contactMessage">Message</label>
                <textarea class="form-control" id="contactMessage" name="contactMessage" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white mt-5 p-4 text-center">
        <p>&copy; <?php echo date("Y"); ?> Bus Management System. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
