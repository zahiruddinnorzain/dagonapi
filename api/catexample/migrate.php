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

if ($conn->query($sql) === TRUE) {
    // success
    echo "migrate_success";
    http_response_code(201);
} else {
    // error
    echo "already_migrate<br>";
    echo "Error: " . $sql . "<br>" . $conn->error;
    http_response_code(500);
}

$conn->close();

?>