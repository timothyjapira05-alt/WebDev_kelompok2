<?php require("controller_member.php"); ?>
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
                        <a class="nav-link active" href="view_member.php">View</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view_addMember.php">Add</a>
                    </li>
                    <li class=" nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                </ul>
            </div>
            <h1>Timothy</h1>
            <table class="table table-bordered table-dark">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Class</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $counter = 0;
                    $allStudent = getAllStudent();
                    foreach ($allStudent as $index => $Student){
                        $counter++;
                    ?>
                    <tr>
                        <th scope="row"><?=$counter?></th>
                        <td><?=$Student->name?></td>
                        <td><?=$Student->phone?></td>
                        <td><?=$Student->class?></td>
                        <td>
                            <a href="view_updateMember.php?updateID=<?=$index?>"></a>
                            <button type="button" class="btn btn-warning">Update</button>
                            <a href="controller_member.php?deleteID=<?=$index?>">
                                <button type="button" class="btn btn-danger">Delete</button>
                            </a>
                            
                        </td>
                    </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>

</body>

</html>