<?php
include "../connectdb.php";

$table_name = "cat";

$id = $_POST["id"];

$sql = "

DELETE FROM $table_name WHERE 
id='$id';

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