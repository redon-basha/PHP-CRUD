<?php
session_start();
require 'conection.php';

$title  = $_POST['Title'];
$type = $_POST['Type'];
$project_id = $_POST['Project_ID'];
$description = $_POST['Description'];
$date = date("Y-m-d");
$user= $_SESSION["User_id"];
$role="Admin";

$sql = "INSERT INTO project (Project_id, Title, Type,Description, Create_date)
     VALUES ('$project_id','$title','$type','$description','$date')";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully !";
 } else {
    echo "Error: " . $sql . "
" . mysqli_error($conn);
 }

$sql1 = "INSERT INTO project_member (User_id, Project_id, Role)
     VALUES ('$user','$project_id','$role')";


 if (mysqli_query($conn, $sql1)) {
    echo "New record created successfully !";
 } else {
    echo "Error: " . $sql1 . "
" . mysqli_error($conn);
 }
 mysqli_close($conn); 
 header("Location: dashboard.php");
?>