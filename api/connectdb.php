<?php
$servername = "localhost";
$username = "root";
$password = "\$admin\$";
$dbname = "dagonapi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("<br>ERROR Connection failed: " . $conn->connect_error);
}