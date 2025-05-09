<?php
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
