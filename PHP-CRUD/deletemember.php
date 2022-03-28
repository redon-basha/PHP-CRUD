<?php
session_start();
require 'conection.php';


$user_id = $_GET['member_for_delete'];
$project_id =$_SESSION["Project_ID"];

$sql = "DELETE FROM project_member WHERE User_id=$user_id and Project_id=$project_id";
        
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully !";
 } else {
    echo "Error: " . $sql . "
" . mysqli_error($conn);
 }
 header("Location: Viewmember.php");
?>