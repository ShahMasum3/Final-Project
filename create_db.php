<?php
<a href="judge.html">Go to Judge Page</a>
<a href="database.html">Go to Database Page</a>

$conn = mysqli_connect("localhost", "root", "");
mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS grading_system");
mysqli_select_db($conn, "grading_system");
mysqli_query($conn, "CREATE TABLE IF NOT EXISTS judges ( id INT AUTO_INCREMENT PRIMARY KEY,username VARCHAR(50),password VARCHAR(100))");


mysqli_query($conn, "CREATE TABLE IF NOT EXISTS admin ( username VARCHAR(50),password VARCHAR(100))");


mysqli_query($conn, "CREATE TABLE IF NOT EXISTS scores (
  id INT AUTO_INCREMENT PRIMARY KEY,
  judge_id INT,
  group_no INT,
  group_members VARCHAR(100),
  project_title VARCHAR(100),
  c1 INT, c2 INT, c3 INT, c4 INT,
  total INT,
  judge_name VARCHAR(50),
  comments TEXT)"
  );

$pass = password_hash("judge", PASSWORD_DEFAULT);
for ($i = 1; $i <= 4; $i++) {
    mysqli_query($conn, "INSERT IGNORE INTO judges (username, password) VALUES ('judge$i', '$pass')");
}

$adminPass = password_hash("admin", PASSWORD_DEFAULT);

mysqli_query($conn, "DELETE FROM admin WHERE username='admin'");
mysqli_query($conn, "INSERT INTO admin (username, password) VALUES ('admin', '$adminPass')");
echo "Database created";
?>
