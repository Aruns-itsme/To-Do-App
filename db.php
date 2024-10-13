<?php
// Database connection parameters
$servername = "localhost";
$username = "todo_user";    // Replace with your database username
$password = "secure_password"; // Replace with your database password
$dbname = "todo_app";       // Replace with your database name

// Create connection to the MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Connection successful
?>
