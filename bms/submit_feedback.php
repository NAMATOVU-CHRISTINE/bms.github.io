<?php
// Include database connection
include('db.php'); // Make sure to update with your actual database connection file

// Check if feedback form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get feedback content from the form
    $feedbackContent = mysqli_real_escape_string($conn, $_POST['feedback']);

    // Insert feedback into the database
    $sql = "INSERT INTO Feedback (FeedbackContent) VALUES ('$feedbackContent')";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Feedback submitted successfully!'); window.location.href='thank_you.php';</script>";
    } else {
        echo "<script>alert('Error submitting feedback: " . mysqli_error($conn) . "'); window.location.href='feedback_form.php';</script>";
    }
}

