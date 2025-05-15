<?php
// Start session
session_start();

// Include the database connection
require_once "db.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user ID from the session
    $user_id = $_SESSION['user_id'] ?? null;

    if (!$user_id) {
        // Redirect to login if user is not logged in
        header("Location: login.php");
        exit;
    }

    // Get form data
    $name = trim($_POST['name']);
    $role = trim($_POST['role']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    
    // Image handling
    $profileImage = $_FILES['profile_image']['name'] ? $_FILES['profile_image']['name'] : null;
    $targetDir = "uploads/"; // Ensure to have this directory with write permissions
    $targetFilePath = $targetDir . basename($profileImage);

    // Update user details in the database
    if ($profileImage) {
        // Image upload
        if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $targetFilePath)) {
            // If a new image is uploaded, update the image path in the database
            $stmt = $conn->prepare("UPDATE staff SET name = ?, Role = ?, Email = ?, PhoneNumber = ?, Address = ?, ProfileImage = ? WHERE StaffID = ?");
            $stmt->bind_param("ssssssi", $name, $role, $email, $phone, $address, $targetFilePath, $user_id);
        } else {
            $error_message = "Error uploading image.";
        }
    } else {
        // If no new image is uploaded, don't update the image path
        $stmt = $conn->prepare("UPDATE staff SET name = ?, Role = ?, Email = ?, PhoneNumber = ?, Address = ? WHERE StaffID = ?");
        $stmt->bind_param("sssssi", $name, $role, $email, $phone, $address, $user_id);
    }

    if (empty($error_message)) {
        $stmt->execute();
        $stmt->close();
        header("Location: profile.php?message=Profile updated successfully");
        exit;
    } else {
        echo '<div class="alert alert-danger">' . $error_message . '</div>';
    }
}

// Fetch user details to pre-fill the form if the user is logged in
$user_id = $_SESSION['user_id'] ?? null;
if ($user_id) {
    $stmt = $conn->prepare("SELECT name, Role, Email, PhoneNumber, Address, ProfileImage FROM staff WHERE StaffID = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($name, $role, $email, $phone, $address, $profileImage);
    $stmt->fetch();
    $stmt->close();
} else {
    // Redirect to login if user is not logged in
    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Bus Management System</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<meta charset="UTF-8">
<title>Edit Profile</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    body {
        background-color: #f4f4f4;
    }
    .container {
        max-width: 400px;
        margin: 50px auto;
        padding: 20px;
        background: white;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
</style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Edit Profile</h1>
        <?php if (isset($_GET['message'])): ?>
            <p style="text-align:center; color:green;"><?php echo htmlspecialchars($_GET['message']); ?></p>
        <?php endif; ?>
        <form action="profile.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($name); ?>" required>
            </div>

            <div class="form-group">
                <label for="role">Role:</label>
                <input type="text" name="role" class="form-control" value="<?php echo htmlspecialchars($role); ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" name="phone" class="form-control" value="<?php echo htmlspecialchars($phone); ?>" required>
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <textarea name="address" class="form-control" required><?php echo htmlspecialchars($address); ?></textarea>
            </div>

            <div class="form-group">
                <label for="profile_image">Profile Image:</label>
                <input type="file" name="profile_image" class="form-control-file">
                <?php if ($profileImage): ?>
                    <img src="<?php echo htmlspecialchars($profileImage); ?>" alt="Profile Image" width="100" class="mt-2">
                <?php endif; ?>
            </div>

            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
        <a href="dashboard.php" class="btn btn-link">Back to Dashboard</a>
    </div>
</body>
</html>
