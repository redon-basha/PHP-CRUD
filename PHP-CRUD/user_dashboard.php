<?php
session_start();
unset($_SESSION["Project_ID"]);
if (isset($_SESSION["is_logged"]) and $_SESSION["Role"] == "Admin") {
    header("Location:dashboard.php");
} 
require 'conection.php';
$user= $_SESSION["User_id"];
$sql = "SELECT * FROM project where Project_id in (Select Project_id from Project_Member where User_id=$user);";
$result2 = $conn->query($sql);





?>
<html>

<head>
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        var u1 = 0
        var p1 = 0

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


        function showproject() {
            if (p1 == 0) {
                document.getElementById('con3').style.visibility = 'visible';
                p1 = 1
            } else {
                document.getElementById('con3').style.visibility = 'hidden';
                p1 = 0
            }

        }
    </script>
    <style type="text/css">
        * {
            font-family: sans-serif;
        }

        header button {
            margin-left: 97%;
        }
        header h1 {
            margin-left: 30%;
        }

        .logout {
            color: white;
            text-decoration: none;
        }

        .logout:visited {
            color: white;
            text-decoration: none;
        }
     
        .content-table {
            margin: auto;
            width: 50%;
            position: relative;
            border-collapse: collapse;
            font-size: 0.9em;
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .content-table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
            font-weight: bold;
            z-index: 0;
        }

        .content-table th,
        .content-table td {
            padding: 10px 30px;
        }

        .content-table tbody tr {
            border-bottom: 2px solid #dddddd;
        }

        .content-table tbody tr:hover {
            border-bottom: 2px solid #34df12;
        }

        .content-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .content-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        .content-table tbody tr:last-of-type:hover {
            border-bottom: 2px solid#34df12;
        }

        .content-table tbody tr:hover {
            color: #34df12;
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

        .buton2 {
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
            position: absolute;
            border: thin;
            background-color: #3fdd47;
            color: white;
            padding-top: 5px;
            padding-bottom: 5px;
            padding-left: 10px;
            padding-right: 10px;
            border-radius: 7%;
            margin-left: 25px;
            margin-top: -4px;
        }
        #add2 {
            margin-top: -171px;
            margin-left: 86.5%;

        }


        .con2 {
            visibility: hidden;
            margin-left: 10%;

            margin-right: 170px;
            display: flex;
            background-color: #4ec037f1;
            width: min-content;
            padding-top: 0.5%;
            padding-bottom: 2%;
            padding-left: 3%;
            padding-right: 3%;
            border-radius: 5%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            color: white;
            border: 1px solid rgb(158, 158, 158);
        }

        .con1 {
            margin: auto;
            margin-top: 60px;
            width: 30%;
            display: flex;
        }

        .con2 input {
            margin-top: -18px;
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .con2 h4 {
            margin-top: 5px;
        }

        .con2 button {
            background-color: #009808;
            border: thin;
            margin-top: 23px;
            margin-left: 40px;
            border-radius: 7%;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 20px;
            padding-right: 20px;
            color: white;
        }

        .inline1 {
            margin-left: 100px;
        }

        .con3 {
            visibility: hidden;
            margin-left: 10%;
            display: flex;
            background-color: #4ec037f1;
            width: min-content;
            padding-top: 0.5%;
            padding-left: 3%;
            padding-right: 3%;
            border-radius: 5%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            color: white;
            border: 1px solid rgb(158, 158, 158);
        }

        .con3 input {
            margin-top: -18px;
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .con3 h4 {
            margin-top: 5px;
        }

        .con3 textarea {
            width: 150px;
            height: 125px;
        }

        .con3 button {
            background-color: #009808;
            margin-top: 10px;
            margin-bottom: 10px;
            margin-left: 25px;
            border: thin;
            border-radius: 7%;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 20px;
            padding-right: 20px;
            color: white;
        }

     
        
    </style>

</head>

<body>
    <header>
        <button class="buton1" type="submit"><a class="logout" href="logout.php">Logout</a></button>
        <div class="h11">
            <h1 id="header2">Projects</h1>
        </div>

    </header>
    <div>  
        <table id="table2" class="content-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Type</th>
                    <th>ID</th>
                    <th>Description</th>
                    <th>Created Date</th>
                    <th>Edit <button class="add_user" onclick="showproject()">Add Project</button></th>
                </tr>
            </thead>
            <tbody>
            <?php
                while ($row = $result2->fetch_assoc()) : ?>
                    <tr>
                        <td> <?php echo$row["Title"]?></td>
                        <td> <?php echo$row["Type"] ?></td>
                        <td> <?php echo$row["Project_id"] ?></td>
                        <td> <?php echo$row["Description"] ?></td>
                        <td> <?php echo$row["Create_date"] ?></td>
                        <td> <a href="middleman.php?view_project=<?php echo $row['Project_id'];?>"><button class='buton1' >View</button></a><a href="delete_user_project.php?delete_project=<?php echo $row['Project_id'];?>"><button class='buton2'>Delete</button></a>
                    </tr>
                <?php endwhile; ?>      
            </tbody>
        </table>
    </div>
    <div class="con1">   
        <form class="f1" method="POST" action="addproject.php">
            <div class="con3" id="con3">
                <div class="inline">
                    <h4>Title</h4><input type="text" id="Title" name="Title" placeholder="    Enter Title...">
                    <h4>Type</h4><input type="text" id="Type" name="Type" placeholder="    Enter Type...">
                    <h4>Project ID</h4><input type="text" id="Project_ID" name="Project_ID" placeholder="   Enter Project ID...">
                </div>
                <div class="inline1">
                    <h4>Description</h4><textarea type="text" id="Description" name="Description" placeholder="    Enter Description..."></textarea>
                    <button type="submit">Add Project</button>
                </div>
            </div>
        </form>
    </div>

</body>

</html>