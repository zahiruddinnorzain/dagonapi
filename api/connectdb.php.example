<?php
header('Access-Control-Allow-Origin: *');

// type mysql or psql

$type = "mysql";
$servername = "localhost";
$username = "root";
$password = "\$admin\$";
$dbname = "dagonapi";

// $type = "psql";
// $servername = "localhost";
// $username = "admin";
// $password = "\$admin\$";
// $dbname = "dagonapi";


// Create connection
if($type == "mysql"){
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("<br>ERROR Connection failed: " . $conn->connect_error);
    }
}

if($type == "psql"){
    $conn = pg_connect("host=$servername dbname=$dbname user=$username password=$password")
    or die ("\n<br>Could not connect to database\n");
}




