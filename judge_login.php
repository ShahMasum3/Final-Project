<?php
session_start();

// FIXED DB connection for InfinityFree
$servername = "sql301.infinityfree.com";
$username = "if0_38921419";
$password = "your_infinityfree_password_here";
$dbname = "if0_38921419_final_project";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Show error if connection fails
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["username"];
    $pass = $_POST["password"];

    // Use prepared statements to avoid SQL injection
    $stmt = mysqli_prepare($conn, "SELECT * FROM judges WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $user);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if ($row && password_verify($pass, $row["password"])) {
        $_SESSION["judge_id"] = $row["id"];
        $_SESSION["judge_name"] = $user;
        header("Location: judge_form.php");
        exit;
    } else {
        echo "<p style='color:red;'>Invalid login. Try again.</p>";
    }
}
?>

<h2>Judge Login</h2>
<form method="post">
  Username: <input name="username" required><br>
  Password: <input type="password" name="password" required><br>
  <input type="submit" value="Login">
</form>