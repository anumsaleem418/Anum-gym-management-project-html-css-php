<?php
// Database Connection File - This file connects to MySQL Database

$host = "localhost";           // MySQL server location
$user = "root";                // MySQL username (default for XAMPP)
$pass = "";                    // MySQL password (empty for XAMPP)
$db = "gym_project";           // Database name

// Create connection to database
$conn = mysqli_connect($host, $user, $pass, $db);

// Check if connection failed
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()); // Show error message if connection fails
}
?>
