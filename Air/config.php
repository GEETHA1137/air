<?php
// Database configuration
$host = 'localhost'; // Database host
$dbname = 'air_quality_tracker'; // Database name
$username = 'root'; // Database username
$password = ''; // Database password (leave empty if using default)

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
