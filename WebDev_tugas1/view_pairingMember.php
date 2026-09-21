<?php include("controller_member.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
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
                        <a class="nav-link " href="view_addMember.php">Add</a>
                    </li>
                    <li class=" nav-item">
                        <a class="nav-link active" href="#">Disabled</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">

                <h1>Pair Classroom Student</h1>
                <table class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Student</th>
                            <th scope="col">Classroom</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $counter = 0;
                        $allClassroom = getAllPairingClassroom();
                        foreach ($allClassroom as $index => $class) {
                            $counter++;
                            ?>
                            <tr>
                                <th scope="row"><?= $counter ?></th>
                                <td><?= $class->student ?></td>
                                <td><?= $class->class_number ?></td>
                                <td>
                                    <button type="button" class="btn btn-warning">Update</button>
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>

                    </tbody>
                </table>
                <form method="POST" action="controller_member.php">

                    <div class="mb-3">
                        <label for="inputName">Student Name</label>
                        <select name="inputName" class="form-select">
                            <?php $allStudent = getAllStudent(); ?>
                            <?php foreach ($allStudent as $Student): ?>
                                <option value="<?= htmlspecialchars($Student->name, ENT_QUOTES, 'UTF-8') ?>">
                                    <?= $Student->name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputName">Classroom</label>
                        <select name="inputAddress" class="form-select">
                            <option value="Classroom 6A">Classroom 6A</option>
                            <option value="Classroom 6B">Classroom 6B</option>
                            <option value="Classroom 6C">Classroom 6C</option>
                        </select>
                    </div>



                    <button name="button_pairingClassroom" type="submit" class="btn btn-primary">PAIR STUDENT</button>
                </form>

            </div>

</body>

</html>