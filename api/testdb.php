<?php

include "connectdb.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    $status = 'DB ERROR';
    die("Connection failed: " . $conn->connect_error);
}else{
    $status = 'DB OK';
}

$conn->close();

?>