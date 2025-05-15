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

// Get the user ID from the session
$user_id = $_SESSION['user_id'];

// Fetch all tickets for the passenger
$ticketsListQuery = "SELECT ticket_id, trip_date, destination, status FROM tickets WHERE passenger_id = ?";
$ticketsListStmt = $conn->prepare($ticketsListQuery);
$ticketsListStmt->bind_param("i", $user_id);
$ticketsListStmt->execute();
$ticketsListResult = $ticketsListStmt->get_result();
$ticketsListStmt->close();

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Tickets</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Light background */
        }
        footer {
            margin-top: 40px;
            text-align: center;
            color: gray;
            padding: 10px 0;
        }
        h2 {
            margin-top: 20px;
            border-bottom: 2px solid #6f42c1; /* Underline for headers */
            padding-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Your Tickets</h1>

        <h2 class="mt-4">Tickets List</h2>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Ticket ID</th>
                    <th>Trip Date</th>
                    <th>Destination</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            <?php if ($ticketsListResult->num_rows > 0): ?>
                <?php while ($ticket = $ticketsListResult->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($ticket['ticket_id']); ?></td>
                    <td><?php echo htmlspecialchars($ticket['trip_date']); ?></td>
                    <td><?php echo htmlspecialchars($ticket['destination']); ?></td>
                    <td><?php echo htmlspecialchars($ticket['status']); ?></td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No tickets found</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>

    <footer>
        &copy; <?php echo date("Y"); ?> Your Company Name. All Rights Reserved.
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
