<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms of Service - Bus Management System</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 
</head>
<body>
<header class="d-flex justify-content-between align-items-center p-3 bg-light text-dark">
        <div class="d-flex align-items-center">
            <div class="logo-container">
                <img src="Images/buslogo.jpeg" alt="Bus Management System Logo" class="logo">
            </div>
            <h1 class="ml-3">Bus Management System</h1>
        </div>   
        <nav>
  </header>       
  <?php include 'links.php'; ?>
    </nav>
   
    <div class="container mt-4">
        <h2>Terms of Service</h2>
        <p>Welcome to the Bus Management System (hereafter referred to as "the Service"). By accessing and using the Service, you agree to comply with and be bound by these Terms of Service (hereafter referred to as "Terms"). If you do not agree with any part of these Terms, you must not use our Service.</p>

        <!-- Card for Acceptance of Terms -->
        <div class="card my-3">
            <div class="card-header">
                <h4>1. Acceptance of Terms</h4>
            </div>
            <div class="card-body">
                <p>By registering, accessing, or using the Service, you indicate that you understand and agree to these Terms. These Terms govern your use of the Service, including any content, functionality, and services offered on or through the Service. Your acceptance of these Terms is a precondition to using the Service.</p>
                <p>These Terms may be supplemented by additional policies or guidelines that are made available to you within the Service, which are also part of these Terms. If any provision of these Terms is found to be invalid or unenforceable, the remaining provisions shall remain in full force and effect.</p>
            </div>
        </div>

        <!-- Card for Modifications to Terms -->
        <div class="card my-3">
            <div class="card-header">
                <h4>2. Modifications to Terms</h4>
            </div>
            <div class="card-body">
                <p>We reserve the right to modify these Terms at any time without prior notice. Changes will be effective immediately upon posting on this page. Your continued use of the Service after any such changes constitutes your acceptance of the new Terms. We encourage you to review these Terms periodically to stay informed about updates. If you do not agree to the modified Terms, you must discontinue your use of the Service.</p>
            </div>
        </div>

        <!-- New Features Section (Cards for each feature) -->
        <h3>New Features in Bus Management System</h3>
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Real-time Bus Tracking</h5>
                        <p class="card-text">Track buses in real-time using GPS integration. View the exact location of buses on the map.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Live Notifications</h5>
                        <p class="card-text">Receive real-time notifications on bus schedules, delays, and cancellations.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Passenger Feedback System</h5>
                        <p class="card-text">Submit your feedback on bus services, driver behavior, and overall experience.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Features -->
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Advanced Payment Options</h5>
                        <p class="card-text">Support for multiple payment gateways such as PayPal, card payments, and mobile money.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">User Profile Customization</h5>
                        <p class="card-text">Allow users to customize their profile, including setting preferred routes and communication preferences.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Bus Reservation System</h5>
                        <p class="card-text">Allow passengers to reserve seats in advance to avoid overcrowding.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Emergency Alerts</h5>
                        <p class="card-text">Instant emergency alerts to notify passengers of any unforeseen events or delays.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Route Optimization</h5>
                        <p class="card-text">AI-powered route optimization to ensure the quickest and safest travel times for passengers.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Passenger History</h5>
                        <p class="card-text">Track your travel history, including past trips and payment records.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Multilingual Support</h5>
                        <p class="card-text">Allow passengers to use the system in their preferred language for a better experience.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Loyalty Program</h5>
                        <p class="card-text">Introduce a rewards system where passengers earn points for regular usage.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Section -->
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
