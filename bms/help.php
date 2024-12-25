<?php
// Include your database connection
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and fetch feedback from the form
    $feedback = mysqli_real_escape_string($conn, $_POST['feedback']);

    // SQL query to insert feedback into the database
    $sql = "INSERT INTO Feedback (FeedbackContent) VALUES ('$feedback')";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Feedback submitted successfully!'); window.location.href='thank_you.php';</script>";
    } else {
        echo "<script>alert('Error submitting feedback: " . mysqli_error($conn) . "'); window.location.href='index.php';</script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <!-- Header Section -->
    <header class="d-flex justify-content-between align-items-center p-3 bg-light text-dark">
        <div class="d-flex align-items-center">
            <div class="logo-container">
                <img src="Images/buslogo.jpeg" alt="Bus Management System Logo" class="logo">
            </div>
            <h1 class="ml-3">Help</h1>
        </div>
    </header>

    <nav>
        <?php include("links.php"); ?>
    </nav>

    <!-- Main Content Section -->
    <main class="container mt-4">
        <!-- Overview of Help Section -->
        <section>
            <div class="card mb-4">
                <div class="card-header">
                    <h2>Overview</h2>
                </div>
                <div class="card-body">
                <p>
    Welcome to the Help section of the Bus Management System. This section is designed to provide you with all the necessary resources to effectively use the system. 
    You will find step-by-step guides, solutions to frequently asked questions, and helpful videos for a smoother experience. 
    Whether you're managing schedules, tracking buses, or accessing reports, we have you covered.
    In addition, you'll find troubleshooting steps for any issues that may arise.
    Our system is also equipped with real-time chat support to assist you with any queries.
    Don't forget to check out our documentation for a comprehensive overview of the system.
    If you have additional questions or need personalized assistance, please feel free to contact our support team.
</p>

                </div>
            </div>
        </section>

        <!-- Search FAQs -->
        <section>
            <h2>Search FAQs</h2>
            <input type="text" id="faqSearch" class="form-control" placeholder="Search for a question...">
        </section>

        <section>
            <h3>Frequently Asked Questions</h3>
            <div class="faq-item">
                <h4>1. How do I create a new bus schedule?</h4>
                <p>Go to the <a href="asset-management.php">Asset Management</a> page and click on "Create New Schedule." Fill in the required details, and click "Save" to create a new schedule.</p>
            </div>
            <div class="faq-item">
                <h4>2. How do I track a bus in real-time?</h4>
                <p>Visit the <a href="real-time-tracking.php">Real-Time Bus Tracking</a> page, and enter the bus ID or route number in the search bar to see the live location of the bus.</p>
            </div>
            <div class="faq-item">
                <h4>3. How do I manage passenger details?</h4>
                <p>You can manage all passenger details on the <a href="passenger-management.php">Passenger Management</a> page, where you can view, add, or update passenger records.</p>
            </div>
            <div class="faq-item">
                <h4>4. What do I do if a bus is delayed?</h4>
                <p>If a bus is delayed, the system will automatically notify you through the <a href="notifications.php">Notifications & Alerts</a> page. You can also set up alerts to receive updates in real-time.</p>
            </div>
        </section>

        <!-- Live Chat Support -->
        <section>
            <h3>Live Chat Support</h3>
            <p>For real-time assistance, click the button below to start a live chat session:</p>
            <a href="live.php" class="btn btn-primary">Start Live Chat</a>
        </section>

   <!-- User Feedback Form -->
<section class="container mt-5">
    <h4 class="text-center mb-4">Give Us Your Feedback</h4>
    <form action="submit_feedback.php" method="POST">
        <div class="form-group">
            <label for="feedback" class="form-label">Your Feedback:</label>
            <textarea id="feedback" class="form-control" name="feedback" rows="4" required></textarea>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success mt-3">Submit Feedback</button>
        </div>
    </form>
</section>



        <!-- Video Tutorials Section -->
        <section>
            <h2>Video Tutorials</h2>
            <ul>
                <li><a href="tutorial1.mp4" target="_blank">How to Create a New Bus Schedule</a></li>
                <li><a href="tutorial2.mp4" target="_blank">Real-Time Bus Tracking</a></li>
                <li><a href="tutorial3.mp4" target="_blank">Setting Up Notifications</a></li>
            </ul>
        </section>

        <!-- System Status -->
        <section>
            <h2>System Status</h2>
            <p>Our system is up and running. We are performing scheduled maintenance every Sunday from 2 AM to 4 AM.</p>
        </section>

        <!-- Accessibility Options -->
        <section>
            <h2>Accessibility Options</h2>
            <button onclick="document.body.style.fontSize='18px';" class="btn btn-secondary">Increase Text Size</button>
            <button onclick="document.body.style.fontSize='14px';" class="btn btn-secondary">Reset Text Size</button>
            <button onclick="document.body.style.backgroundColor='#f4f4f4';" class="btn btn-light">Light Theme</button>
            <button onclick="document.body.style.backgroundColor='#2c3e50'; document.body.style.color='white';" class="btn btn-dark">Dark Theme</button>
        </section>

        <!-- System Requirements -->
        <section>
            <h2>System Requirements</h2>
            <ul>
                <li>Windows 7 or higher</li>
                <li>Mac OS X 10.10 or higher</li>
                <li>Minimum 4GB RAM</li>
                <li>Recommended Screen Resolution: 1366x768</li>
            </ul>
        </section>

        <!-- Troubleshooting Guide -->
        <section>
            <h2>Troubleshooting</h2>
            <ul>
                <li>Issue: System not loading? <a href="troubleshoot.php">Click here for solutions.</a></li>
                <li>Issue: Can't track buses? <a href="troubleshoot.php">Click here for solutions.</a></li>
                <li>Issue: Login problems? <a href="troubleshoot.php">Click here for solutions.</a></li>
            </ul>
        </section>

        <!-- Download Documentation -->
        <section>
            <h2>Download Documentation</h2>
            <p>Download the full system documentation in PDF format for offline use:</p>
            <a href="docs/Bus_Management_System_Documentation.pdf" class="btn btn-info" download>Download Documentation</a>
        </section>

        <!-- Emergency Contact Information -->
        <section>
            <h2>Emergency Contacts</h2>
            <ul>
                <li>Bus Breakdown: +2560753931684</li>
                <li>Route Issues: +2560753931685</li>
                <li>Passenger Safety: +2560753931686</li>
            </ul>
        </section>
    </main>

    <!-- Footer Section -->
    <footer class="bg-light p-3 text-center">
        <p>&copy; 2024 Bus Management System. All rights reserved.</p>
    </footer>

    <script>
        document.getElementById('faqSearch').addEventListener('input', function() {
            let filter = this.value.toLowerCase();
            let faqItems = document.querySelectorAll('.faq-item');
            faqItems.forEach(function(item) {
                let question = item.querySelector('h3').textContent.toLowerCase();
                if (question.indexOf(filter) > -1) {
                    item.style.display = "";
                } else {
                    item.style.display = "none";
                }
            });
        });
    </script>

</body>
</html>
