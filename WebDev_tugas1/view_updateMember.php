<?php 
require("controller_member.php");
    if (isset($_GET["updateID"])){
        $Student_id = $_GET["updateID"];
         $Student = getStudentWithID($_GET["updateID"]);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>View Member</title>
</head>

<body>
    <div class="container p-3">
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-pills card-header-pills">
                    <li class="nav-item">
                        <a class="nav-link" href="view_member.php">View Member</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view_addMember.php">Add Member</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view_classroom.php">View Classroom</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view_addClassroom.php">Add Classroom</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view_member_classroom.php">Member-Classroom</a>
                    </li>
                    
                </ul>
            </div>
            <div class="card-body">

                <h1>Update Student Data</h1>
                <form method="POST" action="controller_member.php">
                    <div class=" form-row">
                        <div class="form-group col-md-6">
                            <label for="inputName">Name</label>
                            <input type="name" class="form-control" name="inputName" value="<?=$Student->name?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputNIM">NIM</label>
                            <input type="nim" class="form-control" name="inputNIM" value="<?=$Student->nim?>">
                        </div>
                    </div>
                    
                        <div class="form-group">
                            <label for="inputGender">Gender</label>
                            <input type="text" class="form-control" name="inputGender" value="<?=$Student->gender?>">
                        </div>
                    

                    <input type="hidden" name="input_id" value="<?=$Student_id?>">
                    <button name="button_updateStudent" type="submit" class="btn btn-primary">Update</button>
                </form>

            </div>

</body>

</html>