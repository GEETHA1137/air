<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Password validation
    if ($password !== $confirm_password) {
        echo "Passwords do not match.";
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data into the database
    $sql = "INSERT INTO users (first_name, username, email, phone_number, password) 
            VALUES ('$first_name', '$username', '$email', '$phone_number', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful. <a href='login2.html'>Login here</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
