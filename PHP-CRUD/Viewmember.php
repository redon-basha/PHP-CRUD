<?php

session_start();

require 'conection.php';
$id = $_SESSION["Project_ID"];

$sql = "SELECT Title From project where Project_id=$id;";
$title = $conn->query($sql);
$title2= $title->fetch_assoc();

$project = "SELECT Name,Surname,User_id,Email FROM user where User_id in (SELECT User_id FROM Project_Member WHERE Project_id=$id);";
$result = $conn->query($project);

$project1 = "SELECT * from project_member where Project_id=$id;";
$result2 = $conn->query($project1);


?>
<html>

<head>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Project  <?php echo $title2['Title']?></title>
    <script>
        var u1 = 0

        function func_delete() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        }

        function func_edit() {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Function not created yet!',

            })
        }

        function showuser() {
            if (u1 == 0) {
                document.getElementById('form1').style.visibility = 'visible';
                u1 = 1
            } else {
                document.getElementById('form1').style.visibility = 'hidden';
                u1 = 0
            }

        }
    </script>
    <style type="text/css">
        * {
            font-family: 'Quicksand', sans-serif;
        }


        .content-table {
           
            position: relative;
            border-collapse: collapse;
            font-size: 0.9em;
            margin: auto;
            width: 50%;
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15)
        }

        .content-table thead tr {
            background-color: #009879;
            color: white;
            text-align: left;
            font-weight: bold;
            font-size: 20px;
        }

        .content-table th,
        .content-table td {
            padding: 12px 15px;
            text-align: center;
        }

        .content-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .content-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .content-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        .title {
            margin-top: 10vh;
            text-align: center;
        }
        .buton2{
            background-color: #c91313;
            border: thin;
            border-radius: 7%;
            padding-top: 5px;
            padding-bottom: 5px;
            padding-left: 10px;
            padding-right: 10px;
            color: white;
        }
        .add_user{
            border: thin;
            background-color: #3fdd47;
            color: white;
            padding-top: 5px;
            padding-bottom: 5px;
            padding-left: 10px;
            padding-right: 10px;
            border-radius: 7%;
        }
        .buton1 {
            background-color: #009808;
            border: thin;
            margin-right: 10px;
            border-radius: 7%;
            padding-top: 5px;
            padding-bottom: 5px;
            padding-left: 10px;
            padding-right: 10px;
            color: white;
        }
        .form1{
            position: absolute;
            visibility: hidden;
            text-align: center;
            background-color: #4ec037f1;
            align-items: center;
            border: thin;
            margin-left: 83%;
            top: 16%;
            width: 10%;
            border-radius: 5%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            color: white;
            border: 1px solid rgb(158, 158, 158);
        }
        .form1 button{
            background-color: #009808;
            border: thin;
            border-radius: 7%;
            color: white;
        }
          .content-table tbody tr:last-of-type:hover {
            border-bottom: 2px solid#34df12;
        }

        .content-table tbody tr:hover {
            color: #34df12;
        }
    </style>
</head>

<body>
    <h1 class="title">Team working on project: <?php echo $title2['Title']?></h1>
    <table class="content-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Email</th>
                <th>ID</th>
                <th>Role</th>
                <td> Edit  <button class="add_user" onclick="showuser()" >Add Member</button></td>
            </tr>
        </thead>
        <tbody>
        <?php
                while ($row = $result->fetch_assoc() ) : ?>
                    <tr>
                        <td> <?php echo$row["Name"] ?></td>
                        <td> <?php echo$row["Surname"] ?></td>
                        <td> <?php echo$row["Email"] ?></td>
                        <td> <?php echo$row["User_id"] ?></td>
                        <td> <?php $row2=$result2->fetch_assoc();
                        echo $row2['Role'] ?></td>
                        <td> <button class='buton1' onclick='func_edit()'>Edit</button><a href="deletemember.php?member_for_delete=<?php echo$row["User_id"];?>"><button class='buton2'>Delete</button></a></td>
                    </tr>
                 <?php endwhile; ?>
                
        </tbody>


    </table>
    <div class="form1" id="form1">
        <form method="POST" action="addmember.php">
            <h4>User ID</h4>
            <input type="text" id="user_id" name="user_id" placeholder="    Enter ID...">
            <h4>Role</h4>
            <input type="text" id="role" name="role" placeholder="    Enter Role...">
            <h4></h4>
            <button type="submit">Add Member</button>
        </form>
    </div>
</body>

</html>