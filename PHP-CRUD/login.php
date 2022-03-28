<?php 
session_start();

require 'conection.php';

// select * from user where USername = 'redon' and PAsswrod = '123';
$sql = "SELECT * FROM user where Username = '" . $_POST["username1"] . "' and Password = '" . $_POST["password1"] . "';";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    

    while ($row = $result->fetch_assoc()) {
        
        $_SESSION["Username"] = $row["Username"];
        $_SESSION["Password"] = $row["Password"];
        $_SESSION["User_id"] = $row["User_id"];
        $_SESSION["Email"] = $row["Email"];
        $_SESSION["Name"] = $row["Name"];
        $_SESSION["Surname"] = $row["Surname"];
        $_SESSION["Role"] = $row["Role"];
        $_SESSION["Project_ID"] = '';
        $_SESSION["is_logged"] = 1;
        break;
    }
    if (isset($_SESSION["is_logged"]) and $_SESSION["Role"] == "Admin") {
        header("Location:dashboard.php");
    } elseif (isset($_SESSION["is_logged"]) and $_SESSION["Role"] != "Admin") {
        header("Location:user_dashboard.php");
    }
  
} else {
    header("Location: index.php?err=1");
}

?>