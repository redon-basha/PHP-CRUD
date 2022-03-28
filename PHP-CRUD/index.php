<?php

session_start();


if (isset($_SESSION["is_logged"]) and $_SESSION["Role"] == "Admin") {
    header("Location:dashboard.php");
}elseif (isset($_SESSION["is_logged"]) and $_SESSION["Role"] != "Admin") {
    header("Location:user_dashboard.php");
}

?>


<html>

<head>

    <title>Login</title>
    <style type="text/css">
        @import "https://use.fontawesome.com/releases/v5.5.0/css/all.css";

        body {
            margin: 0;
            padding: 0;
            background-color: white;
            background-position: left;
            font-family: sans-serif;
        }


        .loginbox {
            width: 320px;
            height: 420px;
            background: #000;
            color: #fff;
            top: 50%;
            left: 50%;
            position: absolute;
            transform: translate(-50%, -50%);
            box-sizing: border-box;
            padding: 70px 30px;
        }

        .avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            position: absolute;
            top: -50px;
            left: calc(50% - 50px);
        }

        h1 {
            margin: 0;
            padding: 0 0 20px;
            text-align: center;
            font-size: 22px;
        }

        .loginbox p {
            margin: 0;
            padding: 0;
            font-weight: bold;
        }

        .loginbox input {
            z-index: 1;
            width: 100%;
            margin-bottom: 20px;
        }

        .loginbox button {
            z-index: 1;
            width: 100%;
            margin-bottom: 20px;
        }

        .loginbox input[type="text"],
        input[type="password"] {
            border: none;
            border-bottom: 1px solid #fff;
            background: transparent;
            outline: none;
            height: 40px;
            color: #fff;
            font-size: 16px;
        }

        .loginbox button {
            border: none;
            outline: none;
            height: 40px;
            background: #fb2525;
            color: #fff;
            font-size: 18px;
            border-radius: 20px;
        }

        .loginbox button:hover {
            cursor: pointer;
            background: #ffc107;
            color: #000;
        }

        .loginbox a {
            text-decoration: none;
            font-size: 12px;
            line-height: 20px;
            color: darkgrey;
        }

        .loginbox a:hover {
            color: #ffc107;
        }

        .ven {
            position: relative;
            display: flex;
        }

        .ven i {
            z-index: 400px;
            margin-top: 10px;
            margin-left: -8px;
            margin-right: 20px;
        }

        .shwopw {
            font-size: 12px;
            margin-left: -100px;
            display: inline;
            color: darkgrey;
        }

        .shwopw input[type=checkbox] {
            margin-right: -110px;
        }
    </style>
</head>

<body>
    <div class="loginbox">
        <img src="avatar.png" class="avatar">
        <h1>Login Here</h1>
        <form action="login.php" method="POST">
            <div class="ven">
                <i class="fas fa-user"></i>
                <input type="text" id="login" name="username1" placeholder="    Enter Username" maxlength="10">
            </div>
            <div class="ven">
                <i class="fas fa-lock"></i>
                <input type="password" id="password" name="password1" placeholder="    Enter Password" maxlength="10">
            </div>
            <div class="shwopw">
                <input type="checkbox" id="check" onclick="myFunction()" />Show password
            </div>
            <br></br>
            <div><button type="submit">Login</button></div>
            
        </form>
        <script>
            function myFunction() {
                var x = document.getElementById("password");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>
        <script>

            <?php if (isset($_GET["err"])) { ?>
                alert('You have entered wrong password.');
            <?php } ?>
            
        </script>
    </div>
</body>

</html>

