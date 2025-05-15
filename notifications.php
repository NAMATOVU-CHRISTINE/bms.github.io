<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications & Alerts</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <!-- Header Section -->
    <header class="d-flex justify-content-between align-items-center p-3 bg-light text-dark">
        <div class="d-flex align-items-center">
            <div class="logo-container">
                <img src="Images/buslogo.jpeg" alt="Bus Management System Logo" class="logo">
            </div>
            <h1 class="ml-3">Notifications & Alerts</h1>
        </div>
    </header>
    <nav>
        <?php include 'links.php'; ?>
    </nav>

    <!-- Main Content Section -->
    <div class="container mt-4">
        <div class="notification-header mb-4">
            <h2>Recent Notifications</h2>
            <p>Please find below the latest notifications regarding bus schedules and alerts.</p>
            <input type="text" id="search" class="form-control" placeholder="Search notifications..." oninput="filterNotifications()" />
        </div>
        
        <div class="notifications-container">
            <div class="notification-item">
                <p class="notification-title"><strong>Bus 101 Delayed</strong> <span class="badge badge-warning">New</span></p>
                <p class="notification-message">Due to unexpected heavy traffic, Bus 101 is currently running approximately 15 minutes late. We apologize for any inconvenience.</p>
                <p class="notification-timestamp">Posted on: <em>June 12, 2023, 10:30 AM</em></p>
                <button class="btn btn-sm btn-light" onclick="markAsRead(this)">Mark as Read</button>
            </div>
            <div class="notification-item">
                <p class="notification-title"><strong>New Schedule Released</strong></p>
                <p class="notification-message">The new bus schedule is now available for download. Please check the schedule section for updates.</p>
                <p class="notification-timestamp">Posted on: <em>June 11, 2023, 09:00 AM</em></p>
                <button class="btn btn-sm btn-light" onclick="markAsRead(this)">Mark as Read</button>
            </div>
            <div class="notification-item">
                <p class="notification-title"><strong>System Maintenance</strong></p>
                <p class="notification-message">Planned system maintenance will occur on Friday, June 15, from 10 PM to 12 AM. The system will be temporarily unavailable during this time.</p>
                <p class="notification-timestamp">Posted on: <em>June 10, 2023, 08:00 PM</em></p>
                <button class="btn btn-sm btn-light" onclick="markAsRead(this)">Mark as Read</button>
            </div>
            <div class="notification-item">
                <p class="notification-title"><strong>Weather Advisory</strong> <span class="badge badge-danger">Urgent</span></p>
                <p class="notification-message">Due to severe weather conditions forecasted for this weekend, please check for any changes to schedules and routes.</p>
                <p class="notification-timestamp">Posted on: <em>June 9, 2023, 03:00 PM</em></p>
                <button class="btn btn-sm btn-light" onclick="markAsRead(this)">Mark as Read</button>
            </div>
        </div>
        
        <!-- Pagination controls (if needed) -->
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center mt-4">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Bus Management System. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Function to filter notifications
        function filterNotifications() {
            const searchValue = document.getElementById("search").value.toLowerCase();
            const notifications = document.querySelectorAll('.notification-item');

            notifications.forEach(notification => {
                const title = notification.querySelector('.notification-title').textContent.toLowerCase();
                if (title.includes(searchValue)) {
                    notification.style.display = ""; // Show notification
                } else {
                    notification.style.display = "none"; // Hide notification
                }
            });
        }

        // Function to mark the notification as read
        function markAsRead(button) {
            const notificationItem = button.parentElement; // Get the parent notification item
            notificationItem.style.opacity = '0.5'; // Change opacity to indicate read status
            button.style.display = 'none'; // Hide the "Mark as Read" button
        }
    </script>
</body>
</html>
