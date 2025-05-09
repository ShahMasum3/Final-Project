
<?php
include 'connect.php';
?>

<a href="judge.html">Go to Judge Page</a>
<a href="database.html">Go to Database Page</a>

<?php

mysqli_query($conn, "
  CREATE TABLE IF NOT EXISTS admin (
    username VARCHAR(50),
    password VARCHAR(100)
  )
");


mysqli_query($conn, "
  CREATE TABLE IF NOT EXISTS scores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    group_no VARCHAR(50),
    group_members TEXT,
    project_title VARCHAR(100),
    total INT
  )
");
?>
