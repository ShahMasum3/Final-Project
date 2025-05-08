<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "grading_system");

$total = $_POST["c1"] + $_POST["c2"] + $_POST["c3"] + $_POST["c4"];
$jid = $_SESSION["judge_id"];

$sql= "INSERT INTO scores (judge_id, group_no, group_members, project_title, c1, c2, c3, c4, total, judge_name, comments)
VALUES ('$jid', '{$_POST["group_no"]}', '{$_POST["group_members"]}', '{$_POST["project_title"]}',
        '{$_POST["c1"]}', '{$_POST["c2"]}', '{$_POST["c3"]}', '{$_POST["c4"]}', 
        '$total', '{$_POST["judge_name"]}', '{$_POST["comments"]}')";

mysqli_query($conn,$sql);
echo "Score submitted";

?>