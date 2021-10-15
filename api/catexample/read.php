<?php
include "../connectdb.php";

$table_name = "cat";

$id = $_GET["id"];

$sql = "

SELECT * FROM $table_name 
WHERE id='$id'

";


$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $rows = array();
    while($r = $result->fetch_assoc()) {
        $rows[] = $r;
    }
    echo json_encode($rows);
    http_response_code(200);

} else {
    echo "0 results";
}

$conn->close();

?>