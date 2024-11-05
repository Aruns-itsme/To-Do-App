<?php
$servername = "mysql.railway.internal";
$username = "root";  // Replace with your database username from Railway
$password = "sdxl1MxPBTlKbMtOMiFybNBOUjrhImE"; // Replace with your database password from Railway
$dbname = "railway"; // Replace with your database name from Railway
$port = 3306;  // Default port for MySQL

// Create connection to the MySQL database
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
