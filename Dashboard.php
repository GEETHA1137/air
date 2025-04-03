<?php
session_start(); // Start session to access session variables

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: Login2.html"); // Redirect to login page if not logged in
    exit();
}

echo "Welcome, " . $_SESSION['username'] . "!";
?>
