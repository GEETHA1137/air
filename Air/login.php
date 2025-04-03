<?php
session_start();
include('config.php');

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Sanitize inputs to prevent SQL injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Query to find the user
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Store user session
            $_SESSION['username'] = $username;
            
            // Set cookies if 'Remember Me' is checked
            if (isset($_POST['remember'])) {
                setcookie('username', $username, time() + (86400 * 30), "/"); // 30 days
            }

            header("Location: dashboard.php");
            exit();
        } else {
            echo "Invalid username or password!";
        }
    } else {
        echo "User not found!";
    }
}
?>