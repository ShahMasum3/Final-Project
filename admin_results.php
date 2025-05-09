<?php
include 'connect.php';
session_start();
if (!isset($_SESSION["admin"])) {
  header("Location: admin_login.php");
  exit;
}


$sql = "SELECT group_no, AVG(total) AS avg_score FROM scores GROUP BY group_no";
$res = mysqli_query($conn, $sql);

echo "<h2>Group Average Scores</h2>";
echo "<table border='1'><tr><th>Group #</th><th>Average Score</th></tr>";
while ($row = mysqli_fetch_assoc($res)) {
  echo "<tr><td>{$row['group_no']}</td><td>{$row['avg_score']}</td></tr>";
}
?>
