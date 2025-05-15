<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Include the database connection
include 'db.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle ticket booking
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedTripId = $_POST['trip_id'];
    $user_id = $_SESSION['user_id']; // Get the currently logged-in user

    // Insert the ticket for the selected trip and user
    $insertTicketQuery = "INSERT INTO tickets (passenger_id, trip_id, status) VALUES (?, ?, 'active')";
    $insertStmt = $conn->prepare($insertTicketQuery);
    $insertStmt->bind_param("ii", $user_id, $selectedTripId);

    if ($insertStmt->execute()) {
        echo "<script>alert('Ticket booked successfully!'); window.location.href='passenger_dashboard.php';</script>";
    } else {
        echo "<script>alert('Error booking ticket: " . $insertStmt->error . "');</script>";
    }
    
    $insertStmt->close();
}

// Close the database connection
$conn->close();
