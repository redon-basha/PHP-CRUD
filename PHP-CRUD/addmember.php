<?php
session_start();
require 'conection.php';


$user_id = $_POST['user_id'];
$role = $_POST['role'];
$project_id =$_SESSION["Project_ID"];

$sql = "INSERT INTO Project_Member (User_id, Project_id, Role)
        VALUES ('$user_id','$project_id' ,'$role')";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully !";
 } else {
    echo "Error: " . $sql . "
" . mysqli_error($conn);
 }
 header("Location: Viewmember.php"); 
?>
