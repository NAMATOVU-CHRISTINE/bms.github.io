<?php
// Start the session
session_start();

// Database configuration
$servername = "localhost"; // Update with your server details
$username = "root"; // Update with your DB username
$password = ""; // Update with your DB password
$dbname = "bus_management_system"; // Your database name

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement
$sql = "SELECT asset_id, name, value, purchase_date, depreciation_rate, category, location FROM assets";
$searchQuery = "";

// Check if a search has been made
if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
    $search = $conn->real_escape_string(trim($_GET['search']));
    $sql .= " WHERE name LIKE '%$search%'"; // Simple search by asset name
}

// Add order by clause
$sql .= " ORDER BY asset_id ASC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset Management</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa; /* Light background */
        }
        header {
            background: #343a40; /* Dark background for header */
            color: white;
        }
        .logo {
            height: 50px;
            width: auto;
        }
        footer {
            text-align: center;
            padding: 20px;
            background: #343a40;
            color: white;
            position: relative;
            bottom: 0;
            width: 100%;
        }
        tbody tr:hover {
            background-color: #e9ecef; /* Light grey on hover */
        }
    </style>
</head>
<body>
    <header class="d-flex justify-content-between align-items-center p-3">
        <div class="d-flex align-items-center">
            <div class="logo-container">
                <img src="Images/buslogo.jpeg" alt="Bus Management System Logo" class="logo">
            </div>
            <h1 class="ml-3">Asset Management</h1>
        </div>
    </header>
    
    <nav class="bg-light">
        <?php include "links.php"; ?>
    </nav>

    <main class="container">
        <h2 class="mt-4">Asset List</h2>

        <!-- Search Functionality -->
        <form method="GET" class="mb-4">
            <input type="text" name="search" class="form-control" placeholder="Search assets..." />
        </form>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Asset ID</th>
                    <th>Name</th>
                    <th>Value</th>
                    <th>Purchase Date</th>
                    <th>Depreciation Rate (%)</th>
                    <th>Category</th>
                    <th>Location</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && $result->num_rows > 0) {
                    // Output each row of data
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['asset_id']}</td>
                                <td>{$row['name']}</td>
                                <td>\${$row['value']}</td>
                                <td>{$row['purchase_date']}</td>
                                <td>{$row['depreciation_rate']}</td>
                                <td>{$row['category']}</td>
                                <td>{$row['location']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No assets found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </main>

    <footer>
        &copy; <?php echo date("Y"); ?> Bus Management System. All Rights Reserved.
    </footer>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
