<?php
require("controller_classroom.php");
if (isset($_GET["updateID"])) {
    $Classroom_id = $_GET["updateID"];
    $Classroom = getClassroomWithID($_GET["updateID"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Update Classroom</title>
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
                        <a class="nav-link " href="view_addMember.php">Add Member</a>
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

                <h1>Update Classroom Data</h1>
                <form method="POST" action="controller_classroom.php">

                    <div class="form-group">
                        <label for="inputClassName">Classroom</label>
                        <input type="text" class="form-control" name="inputClassName"
                            value="<?= $Classroom->className ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputTeacher">Teacher</label>
                        <input type="text" class="form-control" name="inputTeacher" value="<?= $Classroom->teacher ?>">
                    </div>

                    <input type="hidden" name="input_id" value="<?= $Classroom_id ?>">
                    <button name="button_updateClassroom" type="submit" class="btn btn-primary">Update</button>
                </form>


            </div>

</body>

</html>