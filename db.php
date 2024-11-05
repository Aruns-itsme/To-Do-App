<?php
$servername = "junction.proxy.rlwy.net";  // Host from MYSQL_PUBLIC_URL
$username = "root";                       // Username from MYSQL_PUBLIC_URL
$password = "sdxlIMxPBTlKWbMtOMIFybNBOujrhlmE"; // Password from MYSQL_PUBLIC_URL
$dbname = "railway";                      // Database name from MYSQL_PUBLIC_URL
$port = 16808;                            // Port from MYSQL_PUBLIC_URL

// Create connection to the MySQL database
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
