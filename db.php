<?php
// Database configuration
$servername = "localhost"; // Server name
$username = "root"; // Database username
$password = ""; // Database password
$dbname = "Bus_Management_System"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    // Log the error for debugging purposes (you can log to a file)
    error_log("Database connection error: " . $conn->connect_error);
    die("Connection failed: " . $conn->connect_error);
}

// Set character set to utf8mb4 for better character support (like emojis)
$conn->set_charset("utf8mb4");



