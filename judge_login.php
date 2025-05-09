[2:47 AM, 5/9/2025] .: <?php
$host = "sql3.freesqldatabase.com";
$username = "sql3777783";
$password = "cXZz9yKAvx";
$database = "sql3777783";
$port = 3306;

$conn = mysqli_connect($host, $username, $password, $database, $port);

// REMOVE THIS LINE:
// echo "Connected successfully! Added connect.php";
[2:54 AM, 5/9/2025] .: <?php
session_start();
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["username"];
    $pass = $_POST["password"];

    $res = mysqli_query($conn, "SELECT * FROM judges WHERE username='$user'");
    $row = mysqli_fetch_assoc($res);

    if ($row && password_verify($pass, $row["password"])) {
        $_SESSION["judge_id"] = $row["id"];
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
