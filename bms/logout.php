<?php
session_start(); // Start the session

// Unset all of the session variables
$_SESSION = array();

// If it's desired to kill the session, also delete the session cookie if it exists.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    // Expire the session cookie to ensure the cookie is deleted
    setcookie(session_name(), '', time() - 42000, 
        $params["path"], $params["domain"], 
        $params["secure"], $params["httponly"]
    );
}

// Finally, destroy the session
session_destroy();

// Optional: Clear any user-related session variables
// This is especially helpful if you're using multiple session variables for different purposes.
// unset($_SESSION['user_id']);  // Uncomment if you want to unset specific variables.

exit;

