<?php
session_start();
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["username"];
    $pass = $_POST["password"];
    
    $res = mysqli_query($conn, "SELECT * FROM judges WHERE username='$user'");
    $row = mysqli_fetch_assoc($res);

    if ($row && password_verify($pass, $row["password"])) {
        $_SESSION["judge_id"] = $row["id"];
        $_SESSION["judge_name"] = $user;
        header("Location: judge_form.php");
        exit;
    } else {
        echo "Invalid login";
    }
}
?>
    <form method="post">
  Username: <input name="username"><br>
  Password: <input type="password" name="password"><br>
  <input type="submit" value="Login">
</form>
