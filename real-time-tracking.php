<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real-Time Bus Tracking</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Header Section -->
<header class="d-flex justify-content-between align-items-center p-3">
    <div class="d-flex align-items-center">
        <div class="logo-container">
            <img src="Images/buslogo.jpeg" alt="Bus Management System Logo" class="logo" height="50">
        </div>
        <h1 class="ml-3">Real-Time Bus Tracking</h1>
    </div>
</header>

<!-- Navigation -->
<nav>
    <?php include("links.php"); ?>
</nav>

<!-- Main Content Section -->
<main class="container my-4">
    <div class="row">
        <!-- Overview Section -->
        <div class="col-12 mb-4">
            <section>
                <h2>Overview</h2>
                <p>The Real-Time Bus Tracking system allows you to monitor the live location of buses, view estimated arrival times, and track route progress.</p>
            </section>
        </div>
    </div>

    <div class="row">
        <!-- Tracking Features -->
        <div class="col-md-6 mb-4">
            <section>
                <h2>Tracking Features</h2>
                <ul class="list-group">
                    <li class="list-group-item">Live Location of Buses</li>
                    <li class="list-group-item">Estimated Arrival Time at Stops</li>
                    <li class="list-group-item">Route Progress Tracking</li>
                    <li class="list-group-item">Alerts for Delays and Deviations</li>
                </ul>
            </section>
        </div>

        <!-- Bus Tracking Map -->
        <div class="col-md-6 mb-4">
            <section>
                <h2>Bus Tracking Map</h2>
                <div id="map"></div>
            </section>
        </div>
    </div>

    <div class="row">
        <!-- Track Bus Section -->
        <div class="col-md-6 mb-4">
            <section>
                <h2>Track Bus</h2>
                <form id="track-bus-form" action="#" method="GET">
                    <div class="form-group">
                        <label for="bus-id">Enter Bus ID or Route Number:</label>
                        <input type="text" id="bus-id" name="bus-id" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Track Bus</button>
                </form>
            </section>
        </div>

        <!-- Recent Trips Section -->
        <div class="col-md-6 mb-4">
            <section>
                <h2>Recent Trips</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Bus ID</th>
                            <th>Route</th>
                            <th>Departure Time</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Bus 101</td>
                            <td>Route A</td>
                            <td>08:30 AM</td>
                            <td>On Time</td>
                        </tr>
                        <tr>
                            <td>Bus 102</td>
                            <td>Route B</td>
                            <td>09:00 AM</td>
                            <td>Delayed</td>
                        </tr>
                        <tr>
                            <td>Bus 103</td>
                            <td>Route C</td>
                            <td>09:15 AM</td>
                            <td>On Time</td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </div>
    </div>

    <div class="row">
        <!-- User Feedback Section -->
        <div class="col-12">
            <section>
                <h2>User Feedback</h2>
                <form id="feedback-form" action="submit_feedback.php" method="POST">
                    <div class="form-group">
                        <label for="feedback">Your Feedback:</label>
                        <textarea id="feedback" name="feedback" class="form-control" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Submit Feedback</button>
                </form>
            </section>
        </div>
    </div>
</main>

<!-- Footer Section -->
<footer>
    <div class="container">
        <p>&copy; 2024 Bus Management System. All rights reserved.</p>
    </div>
</footer>

<!-- Google Maps API Script -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDOFf3CEvnjrcTpXIa2lLV6sRuV3GpUoI&callback=initMap"></script>
<script>
    function initMap() {
        // Initialize and add the map
        const map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: {lat: -34.397, lng: 150.644} // Replace with actual coordinates
        });

        // Example marker
        const marker = new google.maps.Marker({
            position: {lat: -34.397, lng: 150.644}, // Replace with actual bus coordinates
            map: map,
            title: 'Bus Location'
        });
    }

    // Handling bus tracking
    document.getElementById('track-bus-form').onsubmit = function(event) {
        event.preventDefault(); // Prevent form submission
        const busID = document.getElementById('bus-id').value;

        // Fetch the bus location based on the Bus ID
        fetch(`/get_bus_location.php?bus_id=${busID}`)
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    const { lat, lng } = data.location;
                    map.setCenter({ lat, lng });
                    marker.setPosition({ lat, lng });
                    alert(`Bus ${busID} is at: ${lat}, ${lng}`);
                } else {
                    alert('Bus not found.');
                }
            })
            .catch(error => console.error('Error fetching bus location:', error));
    };
</script>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
