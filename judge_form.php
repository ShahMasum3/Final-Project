<?php
include 'connect.php';
<a href="admin.html">Go to Admin Page</a>


<a href="database.html">Go to Database Page</a>

session_start();
if (!isset($_SESSION["judge_id"])) {
  header("Location: judge_login.php");
  exit;
}
?>
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
    <tr>
      <td>Choose appropriate tools</td>
      <td><input type="radio" name="c2" value="10"></td>
      <td><input type="radio" name="c2" value="15"></td>
    </tr>
    <tr>
      <td>Oral presentation</td>
      <td><input type="radio" name="c3" value="10"></td>
      <td><input type="radio" name="c3" value="15"></td>
    </tr>
    <tr>
      <td>Teamwork</td>
      <td><input type="radio" name="c4" value="10"></td>
      <td><input type="radio" name="c4" value="15"></td>
    </tr>
  </table><br>

  Judge Name:<input name="judge_name" value="<?= $_SESSION['judge_name'] ?>"><br>
  Comments:<br><textarea name="comments" rows="3" cols="40"></textarea><br>
  <input type="submit" value="Submit">
</form>
