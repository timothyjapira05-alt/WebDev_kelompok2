<?php include("controller_member.php"); ?>
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
                        <a class="nav-link" href="view_member.php">View</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="view_addMember.php">Add</a>
                    </li>
                    <li class=" nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">

                <h1>Add Student</h1>
                <form method="POST" action="controller_member.php">
                    <div class=" form-row">
                        <div class="form-group col-md-6">
                            <label for="inputName">Name</label>
                            <input type="name" class="form-control" name="inputName">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPhone">Phone</label>
                            <input type="phone" class="form-control" name="inputPhone">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Class</label>
                        <input type="text" class="form-control" name="inputAddress">
                    </div>

                    <button name=" button_addStudent" type="submit" class="btn btn-primary">ADD STUDENT</button>
                </form>

            </div>

</body>

</html>