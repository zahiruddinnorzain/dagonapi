<?php
include "../connectdb.php";

$table_name = "cat";

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

if ($conn->query($sql) === TRUE) {
    echo "201_success";
    http_response_code(201);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    http_response_code(500);
}

$conn->close();

?>