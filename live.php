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
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <header class="d-flex justify-content-between align-items-center p-3 bg-primary text-white">
        <div class="d-flex align-items-center">
            <div class="logo-container">
                <img src="Images/buslogo.jpeg" alt="Bus Management System Logo" class="logo" style="max-height: 100px;">
            </div>
            <h1 class="ml-3">Bus Management System  " Live Chat"</h1>
        </div>
    </header>

    <nav>
        <?php include("links.php"); ?>
    </nav>

    <main class="container mt-4">

        <!-- Overview of Help Section -->
        <section class="mb-4">
            <h2>Overview</h2>
            <p>This Help section provides guides, frequently asked questions, and contact details to assist you in using the Bus Management System.</p>
        </section>

        <!-- User Guides -->
        <section class="mb-4">
            <h4>User Guide</h4>
            <p class="card-text">Need help navigating our system? Check out our user guide!</p>
            <a href="Userguide.pdf" class="btn btn-secondary mb-3" download>Download User Guide</a>
            <ul class="list-group">
                <li class="list-group-item"><a href="#">Getting Started with the Bus Management System</a></li>
                <li class="list-group-item"><a href="#">How to Track a Bus in Real-Time</a></li>
                <li class="list-group-item"><a href="#">Setting Up Notifications and Alerts</a></li>
                <li class="list-group-item"><a href="#">Creating and Managing Bus Schedules</a></li>
                <li class="list-group-item"><a href="#">Generating Reports and Analytics</a></li>
            </ul>
        </section>

        <!-- Contact Support -->
        <section class="mb-4">
            <h2>Contact Support</h2>
            <p>If you are experiencing issues or have additional questions, feel free to contact our support team:</p>
            <ul class="list-group">
                <li class="list-group-item">Email: <a href="mailto:busmanagementsystem9@gmail.com">busmanagementsystem9@gmail.com</a></li>
                <li class="list-group-item">Phone: +256-753-931-683</li>
               
            </ul>
        </section>

        <!-- Live Chat Section -->
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


            <div class="action-buttons mt-3 d-flex justify-content-between">
                <button class="btn btn-success" onclick="initiateCall()">Call</button>
                <button class="btn btn-danger" onclick="initiateVideo()">Video</button>
                <button class="btn btn-warning" onclick="cancelCall()">Cancel</button>
            </div>

            <div class="video-call" id="videoCall" style="display: none;">
                <h3>Video Call</h3>
                <video id="localVideo" autoplay muted class="w-100 mb-2" style="max-width: 400px;"></video>
                <video id="remoteVideo" autoplay class="w-100" style="max-width: 400px;"></video>
                <button class="btn btn-danger mt-3" onclick="endCall()">End Call</button>
            </div>
        </section>
        
    </main>

    <!-- Footer Section -->
    <footer class="bg-primary text-white text-center p-3">
        <p>&copy; 2024 Bus Management System. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        let localStream;
        let remoteStream;
        let peerConnection;
        const servers = {
            iceServers: [
                {
                    urls: "stun:stun.l.google.com:19302"
                }
            ]
        };

        async function initiateCall() {
            alert('Initiating a call...');
            // Placeholder for actual call functionality
        }

        async function initiateVideo() {
            const videoCallElement = document.getElementById('videoCall');
            videoCallElement.style.display = 'flex';

            localStream = await navigator.mediaDevices.getUserMedia({ video: true, audio: true });
            document.getElementById('localVideo').srcObject = localStream;

            peerConnection = new RTCPeerConnection(servers);
            localStream.getTracks().forEach(track => peerConnection.addTrack(track, localStream));

            peerConnection.ontrack = event => {
                remoteStream = new MediaStream();
                event.streams[0].getTracks().forEach(track => remoteStream.addTrack(track));
                document.getElementById('remoteVideo').srcObject = remoteStream;
            };

            const offer = await peerConnection.createOffer();
            await peerConnection.setLocalDescription(offer);

            // Signaling code to exchange offer/answer goes here
        }

        function cancelCall() {
            alert('Call canceled.');
            if (localStream) {
                localStream.getTracks().forEach(track => track.stop());
            }
            const videoCallElement = document.getElementById('videoCall');
            videoCallElement.style.display = 'none';
        }

        function endCall() {
            if (peerConnection) {
                peerConnection.close();
                peerConnection = null;
            }
            if (localStream) {
                localStream.getTracks().forEach(track => track.stop());
            }
            document.getElementById('videoCall').style.display = 'none';
        }

        function sendMessage() {
            const user = document.getElementById('user').value;
            const message = document.getElementById('message').value;

            if (user && message) {
                const messages = document.getElementById('messages');
                const messageDiv = document.createElement('div');
                messageDiv.classList.add('message', 'user-message', 'mb-2');
                messageDiv.innerHTML = `<span><strong>${user}</strong></span><span>${message}</span>`;
                messages.appendChild(messageDiv);
                document.getElementById('message').value = '';
                messages.scrollTop = messages.scrollHeight; // Scroll to the bottom
            } else {
                alert('Please fill out both fields!');
            }
        }
    </script>
</body>
</html>
