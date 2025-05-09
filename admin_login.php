<?php
include 'connect.php';
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user = $_POST["username"];
  $pass = $_POST["password"];
  $res = mysqli_query($conn, "SELECT * FROM admin WHERE username='$user'");
  $row = mysqli_fetch_assoc($res);

  if ($row && password_verify($pass, $row["password"])) {
    $_SESSION["admin"] = true;
    header("Location: admin_results.php");
    exit;
  } else {
    echo "Invalid admin login";
  }
}
?>
<h2>Admin Login</h2>
<form method="post">
  Username: <input name="username"><br><br>
  Password: <input type="password" name="password"><br><br>
  <input type="submit" value="Login">
</form>
