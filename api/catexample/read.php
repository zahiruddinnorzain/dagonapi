<?php
include "../connectdb.php";
include "table_name.php";

$id = $_GET["id"];

$sql = "

SELECT * FROM $table_name 
WHERE id='$id'

";


// Check connection
if($type == "mysql"){
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
}

if($type == "psql"){
    $results = pg_query($conn, $sql) or die('Query failed: ' . pg_last_error());
    $results = pg_fetch_row($results);
    echo json_encode($result);
    pg_close($conn);
}

?>