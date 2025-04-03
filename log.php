<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if user exists
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
            // Start a session to store user information
            session_start();
            $_SESSION['username'] = $user['username'];
            $_SESSION['first_name'] = $user['first_name'];

            // Redirect to dashboard.html
            header("Location: Dashboard.html");
            exit(); // Make sure to stop further script execution
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "User not found.";
    }

    $conn->close();
}
?>
