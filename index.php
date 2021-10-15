<!DOCTYPE html>
<html>
<head>
<title>Dagon api</title>
</head>
<body>

<?php 
echo 'welcome to Dagon API' ;

$status = 'testing db connection..';
include "api/testdb.php";
echo '<br>DB STATUS: '.$status;

?>

</body>
</html>
