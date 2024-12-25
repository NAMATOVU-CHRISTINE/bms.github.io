<?php
session_start();

// Check if the user is logged in and is staff
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'staff') {
    header("Location: index.php");
    exit();
}

// Include the database connection
include 'db.php';

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Fetch staff details
$staff_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT name, email, PhoneNumber, role FROM staff WHERE StaffID = ?");
$stmt->bind_param("i", $staff_id);
$stmt->execute();
$stmt->bind_result($name, $email, $phone, $role);
$stmt->fetch();
$stmt->close();

// Fetch passengers from database
$passengersQuery = "SELECT passenger_id, name, email, phone FROM passengers";
$passengersResult = $conn->query($passengersQuery);

// Fetch trips
$tripsQuery = "SELECT trip_id, departure_location, destination, trip_date FROM trips ORDER BY trip_date";
$tripsResult = $conn->query($tripsQuery);

// Fetch all tickets
// Fetch all tickets with passenger_id included
$ticketsQuery = "SELECT ticket_id, passenger_id, trip_date, destination, status FROM tickets";
$ticketsResult = $conn->query($ticketsQuery);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Dashboard</title>
    <link rel="stylesheet"href ="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Welcome, <?php echo htmlspecialchars($name); ?>!</h1>

        <div class="user-info">
            <h4>Your Profile</h4>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
            <p><strong>Your ID:</strong> <?php echo htmlspecialchars($staff_id); ?></p>
            <p><strong>Phone Number:</strong> <?php echo htmlspecialchars($phone); ?></p>
            <p><strong>Role:</strong> <?php echo htmlspecialchars($role); ?></p>
        </div>

        <h2>Manage Passengers</h2>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Passenger ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php if ($passengersResult->num_rows > 0): ?>
                <?php while ($passenger = $passengersResult->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($passenger['passenger_id']); ?></td>
                    <td><?php echo htmlspecialchars($passenger['name']); ?></td>
                    <td><?php echo htmlspecialchars($passenger['email']); ?></td>
                    <td><?php echo htmlspecialchars($passenger['phone']); ?></td>
                    <td>
                        <a href="edit_passenger.php?id=<?php echo htmlspecialchars($passenger['passenger_id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="delete_passenger.php?id=<?php echo htmlspecialchars($passenger['passenger_id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this passenger?');">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No passengers found</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>

        <h2>Add New Passenger</h2>
        <form action="add_passenger.php" method="POST">
            <div class="form-group">
                <label for="name">Passenger Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Passenger</button>
        </form>

        <h2>Manage Trips</h2>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Trip ID</th>
                    <th>Departure Location</th>
                    <th>Destination</th>
                    <th>Trip Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php if ($tripsResult->num_rows > 0): ?>
                <?php while ($trip = $tripsResult->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($trip['trip_id']); ?></td>
                    <td><?php echo htmlspecialchars($trip['departure_location']); ?></td>
                    <td><?php echo htmlspecialchars($trip['destination']); ?></td>
                    <td><?php echo htmlspecialchars($trip['trip_date']); ?></td>
                    <td>
                        <a href="edit_trip.php?id=<?php echo htmlspecialchars($trip['trip_id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="delete_trip.php?id=<?php echo htmlspecialchars($trip['trip_id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this trip?');">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No trips found</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>

        <h2>Manage Tickets</h2>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Ticket ID</th>
                    <th>Passenger ID</th>
                    <th>Trip Date</th>
                    <th>Destination</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            <?php if ($ticketsResult->num_rows > 0): ?>
    <?php while ($ticket = $ticketsResult->fetch_assoc()): ?>
    <tr>
        <td><?php echo htmlspecialchars($ticket['ticket_id']); ?></td>
        <td><?php echo htmlspecialchars($ticket['passenger_id']); ?></td>
        <td><?php echo htmlspecialchars($ticket['trip_date']); ?></td>
        <td><?php echo htmlspecialchars($ticket['destination']); ?></td>
        <td><?php echo htmlspecialchars($ticket['status']); ?></td>
    </tr>
    <?php endwhile; ?>
<?php else: ?>
    <tr>
        <td colspan="5">No tickets found</td>
    </tr>
<?php endif; ?>

            </tbody>
        </table>

        <h2>Reporting Overview</h2>
        <div class="row mb-3">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Passengers</h5>
                        <?php
                        $totalPassengersQuery = "SELECT COUNT(*) FROM passengers";
                        $totalPassengersResult = $conn->query($totalPassengersQuery);
                        $totalPassengersCount = $totalPassengersResult->fetch_row()[0];
                        ?>
                        <p class="card-text"><?php echo $totalPassengersCount; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Trips</h5>
                        <?php
                        $totalTripsQuery = "SELECT COUNT(*) FROM trips";
                        $totalTripsResult = $conn->query($totalTripsQuery);
                        $totalTripsCount = $totalTripsResult->fetch_row()[0];
                        ?>
                        <p class="card-text"><?php echo $totalTripsCount; ?></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <footer>
        &copy; <?php echo date("Y"); ?> Bus Management System. All Rights Reserved.
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
