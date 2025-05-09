<?php
session_start();
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["username"];
    $pass = $_POST["password"];

    $stmt = mysqli_prepare($conn, "SELECT * FROM judges WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $user);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if ($row && password_verify($pass, $row["password"])) {
        $_SESSION["judge_id"] = $row["id"];
        $_SESSION["judge_name"] = $row["username"];
        header("Location: judge_form.php");
        exit;
    } else {
        echo "Invalid login";
    }
}
?>
<h2>Judge Login</h2>
<form method="post">
  Username: <input name="username"><br>
  Password: <input type="password" name="password"><br>
  <input type="submit" value="Login">
</form>
