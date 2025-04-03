<?php
session_start(); // Start the session

// Clear session variables
session_unset();

// Destroy the session
session_destroy();

// Clear cookies (if any)
setcookie('username', '', time() - 3600, "/"); // Expire the username cookie
setcookie('user_id', '', time() - 3600, "/"); // Expire the user_id cookie

// Redirect to login page after logging out
header("Location: Login1.html");
exit();
?>
