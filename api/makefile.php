<?php

// echo $sql_table;
echo "generating api file...\n\n";
mkdir("api/".$table_name);
echo "Done make directory $table_name\n";

// ##### make file table_name #####
$file_migrate = fopen("api/$table_name/table_name.php", "w") or die("Unable to open file!");
$txt = '
<?php
$table_name = "'.$table_name.'";

?>

';
fwrite($file_migrate, $txt);
fclose($file_migrate);
echo "Done make > table_name.php\n";

// ##### make file migration #####
$file_migrate = fopen("api/$table_name/migrate.php", "w") or die("Unable to open file!");

$txt = '
<?php

include "../connectdb.php";
include "table_name.php";

$sql = "
CREATE TABLE $table_name (
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
    $results = pg_query($conn, $sql) or die(\'Query failed: \' . pg_last_error());
    $results = pg_fetch_row($results);
    echo json_encode($result);
    pg_close($conn);
}


?>

';

fwrite($file_migrate, $txt);
fclose($file_migrate);
echo "Done make > migrate.php\n";



// ##### make file create #####
$file_migrate = fopen("api/$table_name/create.php", "w") or die("Unable to open file!");

$txt = '
<?php
include "../connectdb.php";
include "table_name.php";

'.$column_list.'

$sql = "

INSERT INTO $table_name 
'.$create_list.'

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
    $results = pg_query($conn, $sql) or die(\'Query failed: \' . pg_last_error());
    $results = pg_fetch_row($results);
    echo json_encode($result);
    pg_close($conn);
}



?>

';

fwrite($file_migrate, $txt);
fclose($file_migrate);
echo "Done make > create.php\n";



// ##### make file update #####
$file_migrate = fopen("api/$table_name/update.php", "w") or die("Unable to open file!");

$txt = '
<?php
include "../connectdb.php";
include "table_name.php";

$id         = $_POST["id"];
'.$column_list.'

$sql = "

UPDATE $table_name
SET 
'.$update_list.'
WHERE id = \'$id\';

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
    $results = pg_query($conn, $sql) or die(\'Query failed: \' . pg_last_error());
    $results = pg_fetch_row($results);
    echo json_encode($result);
    pg_close($conn);
}

?>

';

fwrite($file_migrate, $txt);
fclose($file_migrate);
echo "Done make > update.php\n";


// ##### make file read #####
$file_migrate = fopen("api/$table_name/read.php", "w") or die("Unable to open file!");

$txt = '
<?php
include "../connectdb.php";
include "table_name.php";

$id = $_GET["id"];

$sql = "

SELECT * FROM $table_name 
WHERE id=\'$id\'

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
    $results = pg_query($conn, $sql) or die(\'Query failed: \' . pg_last_error());
    $results = pg_fetch_row($results);
    echo json_encode($result);
    pg_close($conn);
}

?>

';

fwrite($file_migrate, $txt);
fclose($file_migrate);
echo "Done make > read.php\n";


// ##### make file readall #####
$file_migrate = fopen("api/$table_name/readall.php", "w") or die("Unable to open file!");

$txt = '
<?php
include "../connectdb.php";
include "table_name.php";

$sql = "

SELECT * FROM $table_name 

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
    $results = pg_query($conn, $sql) or die(\'Query failed: \' . pg_last_error());
    $results = pg_fetch_row($results);
    echo json_encode($result);
    pg_close($conn);
}

?>

';

fwrite($file_migrate, $txt);
fclose($file_migrate);
echo "Done make > readall.php\n";


// ##### make file delete #####
$file_migrate = fopen("api/$table_name/delete.php", "w") or die("Unable to open file!");

$txt = '

<?php
include "../connectdb.php";
include "table_name.php";

$id = $_POST["id"];

$sql = "

DELETE FROM $table_name WHERE 
id=\'$id\';

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
    $results = pg_query($conn, $sql) or die(\'Query failed: \' . pg_last_error());
    $results = pg_fetch_row($results);
    echo json_encode($result);
    pg_close($conn);
}

?>

';

fwrite($file_migrate, $txt);
fclose($file_migrate);
echo "Done make > delete.php\n\n";
// echo "To migrate please run => php api/$table_name/migrate.php\n";

?>