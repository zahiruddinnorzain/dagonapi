<?php

include "connectdb.php";

// Check connection
if($type == "mysql"){
    if ($conn->connect_error) {
        $status = 'DB ERROR';
        die("Connection failed: " . $conn->connect_error);
    }else{
        $status = 'DB OK';
    }
    $conn->close();
}

if($type == "psql"){
    pg_close($con);
}
?>