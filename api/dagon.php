<?php

$table_name = "kereta";

$sql_table = "
CREATE TABLE $table_name (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    cat_name VARCHAR(30),
    cat_breed TEXT,
    date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )
";

$column_list = '
$cat_name   = $_POST["cat_name"];
$cat_breed  = $_POST["cat_breed"];
';

$create_list = '(cat_name,cat_breed) VALUES (\'$cat_name\',\'$cat_breed\')';

$update_list = '
cat_name = \'$cat_name\', 
cat_breed = \'$cat_breed\'
';

include "makefile.php";

?>