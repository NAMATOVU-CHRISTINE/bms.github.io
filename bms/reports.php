<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports & Analytics</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <h1>Reports & Analytics</h1>
        <nav>
            <?php include("links.php"); ?>
        </nav>
    </header>
    <main>
        <section>
            <h2>Overview</h2>
            <p>Here you can access various reports and analytics to help you manage and improve the efficiency of the bus service.</p>
        </section>

        <section>
            <h2>Available Reports</h2>
            <ul>
                <li><a href="trip_reports.php">View Trip Reports</a> - Access detailed reports of bus trips.</li>
                <li><a href="download_reports.php">Download Reports</a> - Download various reports in PDF format.</li>
                <li><a href="passenger_count.php">Passenger Count</a> - View the total number of passengers per route.</li>
                <li><a href="passenger_summary.php">Passenger Summary</a> - Get a summary of passenger demographics.</li>
                <li><a href="occupancy.php">Occupancy</a> - Analyze bus occupancy rates for better planning.</li>
            </ul>
        </section>

        <section>
            <h2>Analysis Tools</h2>
            <ul>
                <li><a href="trends_patterns.php">Trends and Patterns</a> - Explore trends in passenger usage and bus operations.</li>
                <li><a href="performance_metrics.php">Performance Metrics</a> - Review key performance indicators of the bus service.</li>
                <li><a href="real_time_analytics.php">Real-time Analytics</a> - Monitor live data and analytics for immediate insights.</li>
            </ul>
        </section>
    </main>
    
    <footer>
        <p>&copy; 2024 Bus Management System. All rights reserved.</p>
    </footer>
</body>

</html>
