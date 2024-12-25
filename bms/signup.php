<?php
session_start();
include 'db.php'; // Ensure this file properly connects to the database

// Initialize error messages
$passenger_error_message = "";
$staff_error_message = "";

// Common validation function
function validate_fields($data) {
    return !empty($data["name"]) && !empty($data["email"]) && !empty($data["phone"]) && !empty($data["password"]) && !empty($data["confirm_password"]);
}

// Function to check if email is already registered
function is_email_registered($conn, $email, $table) {
    $sql = "SELECT * FROM $table WHERE email = '$email'";
    $result = $conn->query($sql);
    return $result && $result->num_rows > 0;
}

// Passenger Form Submission
if (isset($_POST['passenger_signup'])) {
    if (!validate_fields($_POST)) {
        $passenger_error_message = "All fields are required.";
    } else {
        $name = $conn->real_escape_string($_POST["name"]);
        $email = $conn->real_escape_string(trim($_POST["email"]));
        $phone = $conn->real_escape_string($_POST["phone"]);
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];
        $gender = $conn->real_escape_string($_POST["gender"]);
        $address = $conn->real_escape_string($_POST["address"]);

        if ($password !== $confirm_password) {
            $passenger_error_message = "Passwords do not match.";
        } elseif (is_email_registered($conn, $email, 'passengers')) {
            $passenger_error_message = "Email already exists.";
        } else {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO passengers (name, email, phone, gender, password_hash, address) VALUES ('$name', '$email', '$phone', '$gender', '$passwordHash', '$address')";

            if ($conn->query($sql) === TRUE) {
                $_SESSION["success_message"] = "Registration successful! as our passenger";
                header("Location: passenger_dashboard.php"); // Redirect to clear form inputs
                exit();
            } else {
                $passenger_error_message = "SQL Error: " . $conn->error;
            }
        }
    }
}

// Staff Form Submission
if (isset($_POST['staff_signup'])) {
    if (!validate_fields($_POST)) {
        $staff_error_message = "All fields are required.";
    } else {
        $name = $conn->real_escape_string($_POST["name"]);
        $email = $conn->real_escape_string(trim($_POST["email"]));
        $phone = $conn->real_escape_string($_POST["phone"]);
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];
        $role = $conn->real_escape_string($_POST["role"]);
        $address = $conn->real_escape_string($_POST["address"]);

        if ($password !== $confirm_password) {
            $staff_error_message = "Passwords do not match.";
        } elseif (is_email_registered($conn, $email, 'staff')) {
            $staff_error_message = "Email already exists.";
        } else {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO staff (Email, PhoneNumber, Role, Address, PasswordHash, Name) VALUES ('$email', '$phone', '$role', '$address', '$passwordHash', '$name')";

            if ($conn->query($sql) === TRUE) {
                $_SESSION["success_message"] = "Registration successful! as our Staff";
                header("Location: staff_dashboard.php"); // Redirect to clear form inputs
                exit();
            } else {
                $staff_error_message = "SQL Error: " . $conn->error;
            }
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Passengers and Staff</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center">Passenger Sign Up</h1>
    <?php if (!empty($passenger_error_message)): ?>
        <div class="alert alert-danger"><?php echo $passenger_error_message; ?></div>
    <?php elseif (isset($_SESSION["success_message"])): ?>
        <div class="alert alert-success"><?php echo $_SESSION["success_message"]; ?></div>
        <?php unset($_SESSION["success_message"]); // Clear the success message after displaying ?>
    <?php endif; ?>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="">
                <input type="hidden" name="passenger_signup" value="1">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone" id="phone" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="form-control" required>
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm-password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Sign Up as Passenger</button>
                <a href="passenger_dashboard.php">Already have an account? Login</a>
                
            </form>
        </div>
    </div>
</div>

<div class="container mt-5">
    <h1 class="text-center">Staff Sign Up</h1>
    <?php if (!empty($staff_error_message)): ?>
        <div class="alert alert-danger"><?php echo $staff_error_message; ?></div>
    <?php elseif (isset($_SESSION["success_message"])): ?>
        <div class="alert alert-success"><?php echo $_SESSION["success_message"]; ?></div>
        <?php unset($_SESSION["success_message"]); ?>
    <?php endif; ?>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="">
                <input type="hidden" name="staff_signup" value="1">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone" id="phone" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-control" required>
                        <option value="">Select Role</option>
                        <option value="Driver">Driver</option>
                        <option value="Conductor">Conductor</option>
                        <option value="Administrator">Administrator</option>
                        <option value="Maintenance">Maintenance</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm-password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Sign Up as Staff</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
