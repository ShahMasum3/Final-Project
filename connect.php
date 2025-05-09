<?php
$host = "sql3.freesqldatabase.com";
$username = "sql3777783";
$password = "CxZZ9ykXAvx";
$database = "sql3777783";
$port = 3306;

$conn = mysqli_connect($host, $username, $password, $database, $port);


mysqli_select_db($conn, $database);
?>
