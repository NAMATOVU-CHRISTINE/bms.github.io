<?php
// search_api.php

// Database connection
$servername = "localhost";
$username = "root";  // Replace with your database username
$password = "";  // Replace with your database password
$dbname = "bus_management_system";  // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

header('Content-Type: application/json');

// Get the search query from the request
$search_query = isset($_GET['search_query']) ? strtolower($_GET['search_query']) : '';

// Initialize an empty array to hold the search results
$search_results = [];

// If a search query is provided, perform the search
if ($search_query) {
    // Escape the search query to prevent SQL injection
    $search_query = $conn->real_escape_string($search_query);

    // Query to search through buses, feedback, or any other table as needed
    $sql = "SELECT bus_number, route, model, capacity FROM buses 
            WHERE LOWER(bus_number) LIKE '%$search_query%' 
            OR LOWER(route) LIKE '%$search_query%' 
            OR LOWER(model) LIKE '%$search_query%'";

    $result = $conn->query($sql);

    // If there are results, add them to the search_results array
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $search_results[] = [
                'title' => $row['bus_number'] . ' - ' . $row['route'],  // You can customize this based on the result
                'description' => "Model: " . $row['model'] . ", Capacity: " . $row['capacity']
            ];
        }
    } else {
        // If no results, indicate that no results were found
        $search_results[] = [
            'title' => 'No results found',
            'description' => 'Sorry, no buses or routes matched your search.'
        ];
    }
}

// Close the database connection
$conn->close();

// Return the results as a JSON response
echo json_encode($search_results);

