<?php
if (isset($_GET['booking_id'])) {
    $booking_id = $_GET['booking_id'];

    // Example query to fetch ticket details based on booking ID
    include 'db.php';
    $stmt = $conn->prepare("SELECT * FROM tickets WHERE ticket_id = ?");
    $stmt->bind_param("i", $booking_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $ticket = $result->fetch_assoc();

    if ($ticket) {
        // Prepare the HTML content for ticket download
        $ticket_html = "
        <html>
        <head>
            <title>Ticket - $booking_id</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    color: #333;
                    background-color: #f4f4f4;
                    margin: 0;
                    padding: 0;
                }
                .container {
                    width: 80%;
                    margin: auto;
                    background: #fff;
                    padding: 20px;
                    border-radius: 5px;
                    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                }
                h1 {
                    text-align: center;
                    color: #007bff;
                }
                .ticket-info {
                    margin-top: 20px;
                }
                .ticket-info p {
                    font-size: 18px;
                    line-height: 1.6;
                }
                .ticket-info .label {
                    font-weight: bold;
                }
                .footer {
                    margin-top: 20px;
                    text-align: center;
                    font-size: 14px;
                    color: #888;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <h1>Ticket Details</h1>
                <div class='ticket-info'>
                    <p><span class='label'>Ticket ID:</span> " . $ticket['ticket_id'] . "</p>
                    <p><span class='label'>Trip Date:</span> " . $ticket['trip_date'] . "</p>
                    <p><span class='label'>Destination:</span> " . $ticket['destination'] . "</p>
                    <p><span class='label'>Bus ID:</span> " . $ticket['bus_id'] . "</p>
                    <p><span class='label'>Status:</span> " . $ticket['status'] . "</p>
                </div>
                <div class='footer'>
                    <p>&copy; " . date('Y') . " Your Travel Company. All rights reserved.</p>
                </div>
            </div>
        </body>
        </html>";

        // Set the headers for the browser to download the HTML file
        header('Content-Type: text/html');
        header('Content-Disposition: attachment; filename="ticket_' . $booking_id . '.html"');
        echo $ticket_html;

        // Close database connection
        $stmt->close();
        $conn->close();

        // Redirect with success message
        header("Location: passenger_dashboard.php?ticket_downloaded=true&booking_id=$booking_id");
        exit();
    } else {
        echo "Ticket not found.";
    }
}
?>
