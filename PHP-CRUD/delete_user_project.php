<?php
require 'conection.php';
$id = $_GET['delete'];
$pid = $_GET['delete_project'];

if (isset( $_GET['delete'])) {
    $sql = "DELETE FROM project_member WHERE User_id=$id";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully !";
     } else {
        echo "Error: " . $sql . "
    " . mysqli_error($conn);
     }
    
    $sql1 = "DELETE FROM user WHERE User_id=$id";
    
     if (mysqli_query($conn, $sql1)) {
        echo "New record created successfully !";
     } else {
        echo "Error: " . $sql1 . "
    " . mysqli_error($conn);
     }
}
if (isset( $_GET['delete_project'])) {
    $sql2 = "DELETE FROM project_member WHERE Project_id=$pid";
    if (mysqli_query($conn, $sql2)) {
        echo "New record created successfully !";
     } else {
        echo "Error: " . $sql2 . "
    " . mysqli_error($conn);
     }
    
    $sql3 = "DELETE FROM project WHERE Project_id=$pid";
    
     if (mysqli_query($conn, $sql3)) {
        echo "New record created successfully !";
     } else {
        echo "Error: " . $sql3 . "
    " . mysqli_error($conn);
     }
}

mysqli_close($conn);
 header("Location: dashboard.php"); 

?>