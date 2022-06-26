<?php
include "../connectdb.php";
include "table_name.php";

$id         = $_POST["id"];
$cat_name   = $_POST["cat_name"];
$cat_breed  = $_POST["cat_breed"];

$sql = "

UPDATE $table_name
SET 
cat_name = '$cat_name', 
cat_breed = '$cat_breed'
WHERE id = '$id';

";

// Check connection
if($type == "mysql"){
    if ($conn->query($sql) === TRUE) {
        echo "201_success";
        http_response_code(201);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        http_response_code(500);
    }
    $conn->close();
}

if($type == "psql"){
    $results = pg_query($conn, $sql) or die('Query failed: ' . pg_last_error());
    $results = pg_fetch_row($results);
    echo json_encode($result);
    pg_close($conn);
}

?>