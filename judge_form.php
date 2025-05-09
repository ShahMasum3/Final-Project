[1:52 AM, 5/9/2025] .: <?php
include 'connect.php';
session_start();

$total = $_POST["c1"] + $_POST["c2"] + $_POST["c3"] + $_POST["c4"];
$jid = $_SESSION["judge_id"];

$group_no = $_POST["group_no"];
$group_members = $_POST["group_members"];
$project_title = $_POST["project_title"];
$c1 = $_POST["c1"];
$c2 = $_POST["c2"];
$c3 = $_POST["c3"];
$c4 = $_POST["c4"];
$judge_name = $_POST["judge_name"];
$comments = $_POST["comments"];

$sql = "INSERT INTO scores 
    (judge_id, group_no, group_members, project_title, c1, c2, c3, c4, total, judge_name, comments)
    VALUES (
        '$jid', '$group_no', '$group_members', '$project_title',
        '$c1', '$c2', '$c3', '$c4', '$total', '$judge_name', '$comments'
    )";

if (mysqli_query($conn, $sql)) {
    echo "Score submitted!";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
[2:06 AM, 5/9/2025] .: <?php
include 'connect.php';
session_start();

if (!isset($_SESSION["judge_id"])) {
    header("Location: judge_login.php");
    exit;
}
?>

<a href="admin.html">Go to Admin Page</a>
<a href="database.html">Go to Database Page</a>

<h2>Computer Science Project</h2>
<form method="post" action="submit_score.php">
  Group Number: <input name="group_no"><br><br>
  Group Members: <input name="group_members"><br><br>
  Project Title: <input name="project_title"><br><br>

  <table border="1">
    <tr><th>Criteria</th><th>Developing (0-10)</th><th>Accomplished (10-15)</th></tr>
    <tr>
      <td>Articulate requirements</td>
      <td><input type="radio" name="c1" value="10"></td>
      <td><input type="radio" name="c1" value="15"></td>
    </tr>
    <!-- Repeat this structure for c2, c3, c4 -->
  </table>

  Judge Name: <input name="judge_name"><br><br>
  Comments: <input name="comments"><br><br>

  <input type="submit" value="Submit">
</form>
