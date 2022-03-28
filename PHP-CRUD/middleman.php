<?php
session_start();
$id = $_GET['view_project'];
$_SESSION["Project_ID"]=$id;
header("Location: Viewmember.php"); 
?>