<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'passenger') {
    header("Location: index.php");
    exit();
}

// Include the database connection
include 'db.php';
$conn = new mysqli($servername, $username, $password, $dbname);

// Initialize variables
$reward_points = 0;
$popularDestinations = [];
$booking_id = null;
$bus_search = '';  // Search query variable
$ticket_search = '';  // Ticket search query
$cancel_ticket_id = null; // Ticket cancellation variable
$bus_rating = ''; // Bus rating variable

// Fetch passenger details based on session user_id
$passenger_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT name, email, phone, address FROM passengers WHERE passenger_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($name, $email, $phone, $address);
$stmt->fetch();
$stmt->close();

// Handle ticket booking
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['trip_date']) || empty($_POST['destination']) || empty($_POST['bus_id'])) {
        echo "<script>alert('Trip date, destination, and bus are required.');</script>";
    } else {
        $trip_date = $_POST['trip_date'];
        $destination = $_POST['destination'];
        $bus_id = $_POST['bus_id'];
        $status = 'active';

        $sql = "INSERT INTO tickets (passenger_id, trip_date, destination, status, bus_id) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isssi", $user_id, $trip_date, $destination, $status, $bus_id);

        if ($stmt->execute()) {
            // Fetch the last inserted booking_id
            $booking_id = $stmt->insert_id;
            echo "<script>alert('Ticket successfully booked!');</script>";
        } else {
            echo "<script>alert('Error booking ticket. Please try again.');</script>";
        }
    }
}

// Handle bus search
if (isset($_POST['search_route'])) {
    $bus_search = $_POST['search_route'];
}

// Handle ticket search
if (isset($_POST['search_ticket'])) {
    $ticket_search = $_POST['ticket_id'];
}

// Handle ticket cancellation
if (isset($_POST['cancel_ticket'])) {
    $cancel_ticket_id = $_POST['cancel_ticket'];
    $cancel_sql = "UPDATE tickets SET status = 'cancelled' WHERE ticket_id = ? AND passenger_id = ?";
    $cancel_stmt = $conn->prepare($cancel_sql);
    $cancel_stmt->bind_param("ii", $cancel_ticket_id, $user_id);
    $cancel_stmt->execute();
    echo "<script>alert('Ticket cancelled successfully!');</script>";
}

// Handle bus rating
if (isset($_POST['rate_bus'])) {
    $bus_rating = $_POST['bus_rating'];
    $bus_id = $_POST['bus_id'];

    $rating_sql = "INSERT INTO bus_ratings (bus_id, passenger_id, rating) VALUES (?, ?, ?)";
    $rating_stmt = $conn->prepare($rating_sql);
    $rating_stmt->bind_param("iii", $bus_id, $user_id, $bus_rating);
    $rating_stmt->execute();
    echo "<script>alert('Thank you for rating the bus!');</script>";
}

// Fetch available buses with search filter
$busesQuery = "SELECT bus_id, bus_number, route, capacity, model, year, status, price, estimated_time FROM buses WHERE status = 'active'";

if ($bus_search) {
    $busesQuery .= " AND route LIKE ?";
    $stmt = $conn->prepare($busesQuery);
    $search_term = "%" . $bus_search . "%";
    $stmt->bind_param("s", $search_term);
} else {
    $stmt = $conn->prepare($busesQuery);
}

$stmt->execute();
$busesResult = $stmt->get_result();

// Fetch active tickets
$ticketsQuery = "SELECT ticket_id, trip_date, destination, status FROM tickets WHERE passenger_id = ? AND status='active'";
$ticketsStmt = $conn->prepare($ticketsQuery);
$ticketsStmt->bind_param("i", $user_id);
$ticketsStmt->execute();
$ticketsResult = $ticketsStmt->get_result();
$ticketsStmt->close();

// Fetch popular destinations
$popularDestinationsQuery = "SELECT destination, COUNT(*) AS bookings FROM tickets GROUP BY destination ORDER BY bookings DESC LIMIT 5";
$popularDestinationsResult = $conn->query($popularDestinationsQuery);
while ($row = $popularDestinationsResult->fetch_assoc()) {
    $popularDestinations[] = $row;

}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel = "stylesheet"href = "style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 <title>Passenger Dashboard</title>
</head>
<style>
body {
    background:'Images/BGG.jpeg';
}
</style>
<body>
<div class="container mt-4">
    <button id="goBackButton" class="btn btn-secondary mb-3">Return to Main Page</button>

    <div class="row">
        <!-- Left Section: Profile and Ticket Booking -->
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h1>Your Profile</h1>
                    <p>Name: <?php echo htmlspecialchars($name); ?></p>
                    <p>user_id: <?php echo htmlspecialchars($passenger_id); ?></p>
                    <p>Email: <?php echo htmlspecialchars($email); ?></p>
                    <p>Phone: <?php echo htmlspecialchars($phone); ?></p>
                    <p>Address: <?php echo nl2br(htmlspecialchars($address)); ?></p>
                    <p>Reward Points: <?php echo htmlspecialchars($reward_points); ?></p>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <h2>Book a Ticket</h2>
                    <form method="POST">
                        <div class="form-group">
                            <label for="trip_date">Trip Date:</label>
                            <input type="datetime-local" name="trip_date" id="trip_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="destination">Destination:</label>
                            <input type="text" name="destination" id="destination" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="bus_id">Bus ID:</label>
                            <input type="number" name="bus_id" id="bus_id" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Book Ticket</button>
                    </form>
</div><div class="mt-2">
            </div><?php if ($booking_id): ?>
                        <a href="download_ticket.php?booking_id=<?php echo $booking_id; ?>" class="btn btn-primary mt-2">Download Ticket</a>
                    <?php endif; ?></div>

<?php
if (isset($_GET['ticket_downloaded']) && $_GET['ticket_downloaded'] == 'true') {
    $booking_id = $_GET['booking_id'];

    // Query to fetch ticket details based on booking ID
    include 'db.php';
    $stmt = $conn->prepare("SELECT * FROM tickets WHERE ticket_id = ?");
    $stmt->bind_param("i", $booking_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $ticket = $result->fetch_assoc();

    // Check if the ticket is found
    if ($ticket) {
        echo "
        <div class='container mt-5'>
            <div class='alert alert-success' role='alert'>
                <strong>Success!</strong> Your ticket has been downloaded.
            </div>
            <div class='card'>
                <div class='card-body'>
                    <h4 class='card-title'>Ticket Details</h4>
                    <p><strong>Ticket ID:</strong> " . $ticket['ticket_id'] . "</p>
                    <p><strong>Trip Date:</strong> " . $ticket['trip_date'] . "</p>
                    <p><strong>Destination:</strong> " . $ticket['destination'] . "</p>
                    <p><strong>Bus ID:</strong> " . $ticket['bus_id'] . "</p>
                    <p><strong>Status:</strong> " . $ticket['status'] . "</p>
                </div>
            </div>
        </div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Ticket not found.</div>";
    }

    // Close database connection
    $stmt->close();
    $conn->close();
}
?>
</div>
        <!-- Right Section: Bus Search, Active Tickets, Popular Destinations -->
        <div class="col-md-6">
            <!-- Bus Search and Available Buses -->
            <div class="card mb-4">
                <div class="card-body">
                    <h2>Search Bus by Route</h2>
                    <form method="POST">
                        <div class="form-group">
                            <label for="search_route">Search Route:</label>
                            <input type="text" name="search_route" id="search_route" class="form-control" value=<?php echo isset($_POST['search_route']) ? '' : htmlspecialchars($bus_search); ?>>
                        </div>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>

                    <h2>Available Buses</h2>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Bus Number</th>
                            <th>Route</th>
                            <th>Capacity</th>
                            <th>Price</th>
                            <th>Estimated Time</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if ($busesResult->num_rows > 0): ?>
                            <?php while ($bus = $busesResult->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($bus['bus_number']); ?></td>
                                    <td><?php echo htmlspecialchars($bus['route']); ?></td>
                                    <td><?php echo htmlspecialchars($bus['capacity']); ?></td>
                                    <td><?php echo 'shs' . htmlspecialchars($bus['price']); ?></td>
                                    <td><?php echo htmlspecialchars($bus['estimated_time']); ?> hrs</td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr><td colspan="5">No buses available.</td></tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Ticket Search -->
            <div class="card mb-4">
                <div class="card-body">
                    <h2>Search Active Tickets</h2>
                    <form method="POST">
                        <div class="form-group">
                            <label for="ticket_id">Ticket ID:</label>
                            <input type="number" name="ticket_id" id="ticket_id" class="form-control">
                        </div>
                        <button type="submit" name="search_ticket" class="btn btn-primary">Search</button>
                    </form>

                    <h2>Your Active Tickets</h2>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Ticket ID</th>
                            <th>Trip Date</th>
                            <th>Destination</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if ($ticket_search): ?>
                            <?php while ($ticket = $ticketsResult->fetch_assoc()): ?>
                                <?php if ($ticket['ticket_id'] == $ticket_search): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($ticket['ticket_id']); ?></td>
                                        <td><?php echo htmlspecialchars($ticket['trip_date']); ?></td>
                                        <td><?php echo htmlspecialchars($ticket['destination']); ?></td>
                                        <td><?php echo htmlspecialchars($ticket['status']); ?></td>
                                        <td>
                                            <form method="POST">
                                                <input type="hidden" name="cancel_ticket" value="<?php echo $ticket['ticket_id']; ?>">
                                                <button type="submit" class="btn btn-danger">Cancel</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr><td colspan="5">No active tickets found.</td></tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Popular Destinations -->
            <div class="card mb-4">
                <div class="card-body">
                    <h2>Popular Destinations</h2>
                    <ul>
                        <?php foreach ($popularDestinations as $destination): ?>
                            <li><?php echo htmlspecialchars($destination['destination']); ?> (<?php echo $destination['bookings']; ?> bookings)</li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <!-- Bus Rating -->
            <div class="card mb-4">
                <div class="card-body">
                    <h2>Rate Your Bus Trip</h2>
                    <form method="POST">
                        <div class="form-group">
                            <label for="bus_rating">Rating (1 to 5):</label>
                            <input type="number" name="bus_rating" id="bus_rating" class="form-control" min="1" max="5" required>
                        </div>
                        <div class="form-group">
                            <label for="bus_id">Bus ID:</label>
                            <input type="number" name="bus_id" id="bus_id" class="form-control" required>
                        </div>
                        <button type="submit" name="rate_bus" class="btn btn-primary">Submit Rating</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    document.getElementById("goBackButton").addEventListener("click", function() {
        window.location.href = "index.php";  // Go back to the main page
    });
</script>
</body>
</html>
