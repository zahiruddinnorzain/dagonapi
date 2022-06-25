<?php

include "../connectdb.php";

$sql = "
CREATE TABLE cat (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    cat_name VARCHAR(30),
    cat_breed TEXT,
    date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )
";


// Check connection
if($type == "mysql"){
    if ($conn->query($sql) === TRUE) {
        echo "migrate_success";
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