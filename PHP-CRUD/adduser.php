<?php

require 'conection.php';
$name = $_POST['Name'];
$surname = $_POST['Surname'];
$email = $_POST['Email'];
$role = $_POST['Role'];
$username = $_POST['Username'];
$passwod = $_POST['Password'];
$user_id = $_POST['User_ID'];
$sql = "INSERT INTO user (User_id, Name, Surname, Email, Username, Password, Role)
	 VALUES ('$user_id','$name','$surname','$email','$username','$passwod','$role')";
	 if (mysqli_query($conn, $sql)) {
		echo "New record created successfully !";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
     mysqli_close($conn);
     header("Location: dashboard.php"); 
?>