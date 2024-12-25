<?php
session_start();
include 'db.php'; // Ensure this file connects to the database properly

// Initialize error message variable
$error_message = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve POST data
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Check if email or password is empty
    if (empty($email) || empty($password)) {
        $error_message = "Email or password cannot be empty.";
    } else {
        // Prepare SQL to check if user is a passenger
        $stmt = $conn->prepare("SELECT passenger_id, name, password_hash FROM passengers WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        // Debugging: Check if query found any results
        if ($stmt->num_rows > 0) {

            $stmt->bind_result($passenger_id, $name, $hashed_password);
            $stmt->fetch();

            // Verify password
            if (password_verify($password, $hashed_password)) {
                $_SESSION['name'] = $name;
                 $_SESSION['user_id']=$passenger_id;
                $_SESSION['user_type'] = 'passenger';
                header("Location: passenger_dashboard.php");
                exit();
            } else {
                $error_message = "Invalid password.";
            }
        } else {
            // Check in staff if no passenger found
            $stmt->close();
            $stmt = $conn->prepare("SELECT StaffID, name, PasswordHash FROM staff WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($staff_id, $name, $hashed_password);
                $stmt->fetch();

                // Verify password for staff
                if (password_verify($password, $hashed_password)) {
                    $_SESSION['name'] = $name;
                    $_SESSION['user_type'] = 'staff';
                    header("Location: staff_dashboard.php");
                    exit();
                } else {
                    $error_message = "Invalid password for staff user.";
                }
            } else {
                $error_message = "No user found with that email.";
            }
        }
        $stmt->close();
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Management System</title>
    <meta name="description" content="Bus Management System for managing bus schedules, tracking bus locations, and managing passenger information.">
    <meta name="keywords" content="bus management, bus schedules, real-time tracking, passenger information">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
    <header class="d-flex justify-content-between align-items-center p-3 bg-light text-dark">
        <div class="d-flex align-items-center">
            <div class="logo-container">
                <img src="Images/buslogo.jpeg" alt="Bus Management System Logo" class="logo">
            </div>
            <h1 class="ml-3">Bus Management System</h1>
        </div>
        <div class="d-flex align-items-center">
            <!-- Search Form -->
            <form class="form-inline my-2 my-lg-0" action="index.php" method="GET">
                <input type="text" name="search_query" class="form-control" placeholder="Search..." required>
                <button type="submit" class="btn btn-light ml-2">
                    <i class="fas fa-robot"></i> <!-- Search Robot Icon -->
                </button>
            </form>

            <div class="container mt-4"> <!-- This is your container -->
                <?php
                // Sample content (this would usually come from a database or another source)
                $content = [
                    "Bus 101 - Route 1" => "City Center to Uptown. Capacity: 50 passengers.",
                    "Bus 102 - Route 2" => "Downtown to Riverside. Capacity: 45 passengers.",
                    "Bus 103 - Route 3" => "Airport to City Center. Capacity: 60 passengers.",
                    "Bus 104 - Route 4" => "Suburbs to Downtown. Capacity: 40 passengers.",
                    "Maintenance Alert" => "Bus 101 is under maintenance. Expected delay on route 2.",
                    "Upcoming Trip" => "Trip to Riverside is scheduled for tomorrow at 10:00 AM.",
                ];

                // Check if a search query is set in the URL parameters
                if (isset($_GET['search_query'])) {
                    $search_query = $_GET['search_query'];
                    $search_query_lower = strtolower($search_query);  // Convert the search query to lowercase for case-insensitive search

                    echo "<h3>Search Results for: " . htmlspecialchars($search_query) . "</h3>";

                    $found = false;  // Flag to track if we found any matching results

                    // Loop through the content to find matching results
                    foreach ($content as $title => $description) {
                        if (strpos(strtolower($title), $search_query_lower) !== false || strpos(strtolower($description), $search_query_lower) !== false) {
                            // If match found, display the result inside the container
                            echo "<div class='result'>";
                            echo "<h4>" . htmlspecialchars($title) . "</h4>";
                            echo "<p>" . htmlspecialchars($description) . "</p>";
                            echo "</div>";
                            $found = true;  // Mark that a match was found
                        }
                    }

                    // If no results found, display a message inside the container
                    if (!$found) {
                        echo "<p>No results found for '" . htmlspecialchars($search_query) . "'</p>";
                    }
                } else {
                    echo "<p>Please enter a search term.</p>";
                }
                ?>
            </div>
        </div>
    </header>
    <nav>
        <?php include 'links.php'; ?>
    </nav>
    <div class="container mt-4">
        <main class="row">
            <div class="col-md-8 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Welcome</h2>
                        <p class="card-text">Welcome to our bus management system. This platform is designed to help you manage bus schedules, track bus locations in real-time, manage passenger information, and more. Use the navigation above to access various sections of the system.</p>
                    </div>
                </div>
                <!-- Additional information cards -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">Features</h2>
                        <p class="card-text">Our system offers a variety of features including real-time tracking, schedule management, and passenger information management.</p>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-title"><a href="about.php">About Us</a></h3>
                        <p class="card-text">Learn more about our company and our mission to provide the best bus management solutions.</p>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-title">Services</h3>
                        <p class="card-text">Explore the range of services we offer to make your bus management more efficient and effective.</p>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-title">Notifications</h3>
                        <p class="card-text">Stay updated with the latest notifications and alerts regarding your bus schedules and routes.</p>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-title">Verification</h3>
                        <p class="card-text">Ensure the authenticity and accuracy of your bus and passenger information with our verification tools.</p>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-title">Help</h3>
                        <p class="card-text">Need assistance? Visit our help section for FAQs, support, and contact information.</p>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-title">Contact Us</h3>
                        <p class="card-text">Have any questions or need further assistance? Get in touch with us using the form below.</p>
                        <form>
                            <div class="form-group">
                                <label for="contactName">Name</label>
                                <input type="text" class="form-control" id="contactName" placeholder="Enter your name" required>
                                <div class="invalid-feedback">
                                    Please enter your name.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="contactEmail">Email address</label>
                                <input type="email" class="form-control" id="contactEmail" placeholder="Enter your email" required>
                                <div class="invalid-feedback">
                                    Please enter a valid email address.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="contactMessage">Message</label>
                                <textarea class="form-control" id="contactMessage" rows="3" placeholder="Enter your message" required></textarea>
                                <div class="invalid-feedback">
                                    Please enter your message.
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-title">Testimonials</h3>
                        <p class="card-text">Read what our users have to say about our service.</p>
                        <blockquote class="blockquote">
                            <p class="mb-0">"This bus management system has made my daily commute so much easier!"</p>
                            <footer class="blockquote-footer">Yiga Jonathan</footer>
                        </blockquote>
                        <blockquote class="blockquote">
                            <p class="mb-0">"I love the real-time tracking feature. It helps me plan my trips better."</p>
                            <footer class="blockquote-footer">Namatovu X-tine</footer>
                        </blockquote>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-title">FAQ</h3>
                        <p class="card-text">Find answers to common questions about our service.</p>
                        <ul>
                            <li><strong>How do I track my bus?</strong> Use the real-time tracking feature on our platform.</li>
                            <li><strong>How do I manage my schedule?</strong> Use the schedule management feature to plan your trips.</li>
                            <li><strong>How do I contact support?</strong> Use the contact form above or email us at support@busmanagement.com.</li>
                        </ul>
                    </div>
                </div>

                <!-- Additional Information Section -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-title">Latest News</h3>
                        <p class="card-text">Stay tuned for the latest updates regarding our services and features.</p>
                        <ul>
                            <li>New real-time tracking features are coming soon!</li>
                            <li>We're launching our new mobile app next month for easier access on the go.</li>
                            <li>Join our community events for better service feedback.</li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="col-md-4 mb-4">
                <div class="form-container" id="container">
                    <h1 class="text-center mb-4">Sign In</h1>
                    <form id="signInForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="form-group">
                            <label for="email" class="font-weight-bold">Email</label>
                            <input type="text" name="email" id="email" placeholder="Enter your email" required class="form-control rounded-pill">
                        </div>
                        <div class="form-group">
                            <label for="password" class="font-weight-bold">Password</label>
                            <input type="password" name="password" id="password" placeholder="Enter your password" required class="form-control rounded-pill">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block rounded-pill mt-3">Sign In</button>
                        <!-- Reset Button -->
                        <button type="button" class="btn btn-secondary btn-block rounded-pill mt-3" onclick="resetForm()">Reset</button>

                        <div class="text-center mt-3">
                            <a href="profile.php">Forgot your password?</a>
                        </div>
                        <div class="text-center mt-4">
                            <span>Don't have an account?</span>
                            <a href="signup.php" class="btn btn-secondary">Sign Up</a>
                        </div>
                        <?php if (!empty($error_message)): ?>
                            <div class="alert alert-danger mt-3"><?php echo $error_message; ?></div>
                        <?php endif; ?>
                    </form>
                </div>

                <script>
                // JavaScript function to reset the form
                function resetForm() {
                    document.getElementById("signInForm").reset(); // This resets the form inputs
                }
                </script>

                <div class="image-container mt-4">
                    <div class="card mb-2">
                        <img src="Images/bs2.jpeg" alt="Stage" class="card-img-top" />
                        <div class="card-body">
                            <p class="card-text">Quality Buses</p>
                        </div>
                    </div>
                    <div class="card mb-2">
                        <img src="Images/bs6.jpg" alt="Quality Buses" class="card-img-top">
                        <div class="card-body">
                            <p class="card-text">Stage</p>
                        </div>
                    </div>
                    <div class="card mb-2">
                        <img src="Images/bs7.jpg" alt="At your time" class="card-img-top">
                        <div class="card-body">
                            <p class="card-text">At your time</p>
                        </div>
                    </div>
                    <div class="card mb-2">
                        <img src="Images/bus.jpeg" alt="At your time" class="card-img-top">
                        <div class="card-body">
                            <p class="card-text">The best travel means</p>
                        </div>
                    </div>
                    <div class="card mb-2">
                        <img src="Images/bus2.jpg" alt="At your time" class="card-img-top">
                        <div class="card-body">
                            <p class="card-text">Your Express Servant</p>
                        </div>
                    </div>
                    <div class="card mb-2">
                        <img src="Images/bs5.jpg" alt="Comfortable" class="card-img-top">
                        <div class="card-body">
                            <p class="card-text">Comfortable</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <footer class="bg-dark text-white mt-5 p-4 text-center">
        <p>&copy; <?php echo date("Y"); ?> Bus Management System. All rights reserved.</p>
        <div class="footer-links">
            <a href="privacy.php" class="text-white">Privacy Policy</a> |
            <a href="terms.php" class="text-white">Terms of Service</a> |
            <a href="contactus.php" class="text-white">Contact Us</a>
        </div>
        <div class="social-media mt-3">
            <a href="#" class="text-white mr-3"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-white mr-3"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
        </div>
    </footer>
</body>
</html>
