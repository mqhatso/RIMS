<?php
$servername = "localhost"; // Usually localhost
$username = "root"; // Default for XAMPP/WAMP
$password = ""; // Default for XAMPP/WAMP (leave empty)
$dbname = "ims_db"; // Replace with your actual database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
