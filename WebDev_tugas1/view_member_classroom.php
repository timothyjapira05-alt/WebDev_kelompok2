<?php
require("controller_classroom.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>View Student & Classroom</title>
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
                        <a class="nav-link active" href="view_member_classroom.php">Member-Classroom</a>
                    </li>

                </ul>
            </div>
            <h1>View Student & Classroom</h1>
            <table class="table table-bordered table-dark">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Student</th>
                        <th scope="col">Classroom</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php
                    $counter = 0;
                    foreach (getAllClassroom() as $classroom) {
                        foreach ($classroom->studentIds as $studentId) {
                            $student = getStudentWithID($studentId);
                            if ($student === null) {
                                continue;
                            }
                            $counter++;
                            ?>
                            <tr>
                                <th scope="row"><?= $counter ?></th>
                                <td><?= htmlspecialchars($student->name) ?></td>
                                <td><?= htmlspecialchars($classroom->className) ?></td>
                                <td>
                                    <a href="controller_classroom.php?deleteStudentID=<?= $student->id ?>&deleteClassroomID=<?= $classroom->id ?>">
                                        <button type="button" class="btn btn-danger">Delete</button>
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>

                </tbody>
            </table>

            <form method="POST" action="controller_classroom.php">
                <label>Student</label>
                <select class="form-control" name="student_id" required>
                    <option selected disabled value="">Pick any student</option>
                    <?php foreach (getAllStudent() as $student): ?>
                        <option value="<?= $student->id ?>"><?= htmlspecialchars($student->name) ?></option>
                    <?php endforeach; ?>
                </select>
                <br>
                <label>Classroom</label>
                <select class="form-control" name="classroom_id" required>
                    <option selected disabled value="">Pick any classroom</option>
                    <?php foreach (getAllClassroom() as $classroom): ?>
                        <option value="<?= $classroom->id ?>"><?= htmlspecialchars($classroom->className) ?></option>
                    <?php endforeach; ?>
                </select>
                <br>
                <button name="button_submitPair" type="submit" class="btn btn-primary">ADD PAIR TO CLASSROOM DATA</button>
            </form>
        </div>

</body>

</html>