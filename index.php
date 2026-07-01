<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-Final-Project</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</head>

<body>
    <section>
        <h1 style="text-align: center;">STUDENT DATABASE</h1>
        <div class="container">
            <div class="text-end">
                <a href="logout.php" class="btn btn-danger">Logout</a> <!-- Logout Button -->
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="adddata.php" method="post">
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label for="">Student Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="form-group col-lg-3">
                                <label for="">Grade</label>
                                <select name="grade" id="grade" class="form-control" required>
                                    <option value="">Select a Grade</option>
                                    <option value="6">Grade 6</option>
                                    <option value="7">Grade 7</option>
                                    <option value="8">Grade 8</option>
                                    <option value="9">Grade 9</option>
                                    <option value="10">Grade 10</option>
                                    <option value="11">Grade 11</option>
                                    <option value="12">Grade 12</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-3">
                                <label for="">Marks</label>
                                <input type="number" name="marks" id="marks" class="form-control" required>
                            </div>
                            <div class="form-group col-lg-2" style="display: grid;align-items: flex-end;">
                                <input type="submit" name="submit" id="submit" class="btn" value="Add Student">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section style="margin: 50px 0;">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Student Name</th>
                                <th scope="col">Grade</th>
                                <th scope="col">Marks</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            session_start(); // Start the session
                            if (!isset($_SESSION['username'])) { // Check if user is logged in
                                header("location: login.php"); // Redirect to login page if not logged in
                                exit();
                            }
                                require_once "conn.php";
                                $sql_query = "SELECT * FROM results";
                                if ($result = $conn ->query($sql_query)) {
                                    while ($row = $result -> fetch_assoc()) { 
                                        $Id = $row['id'];
                                        $Name = $row['name'];
                                        $Grade = $row['class'];
                                        $Marks = $row['marks'];
                            ?>
                            <tr>
                                <td><?php echo $Id; ?></td>
                                <td><?php echo $Name; ?></td>
                                <td><?php echo $Grade; ?></td>
                                <td><?php echo $Marks; ?></td>
                                <td><a href="updatedata.php?id=<?php echo $Id; ?>" class="btn btn-primary">Edit</a></td>
                                <td><a href="deletedata.php?id=<?php echo $Id; ?>" class="btn btn-danger">Delete</a></td>
                            </tr>
                            <?php
                                    } 
                                } 
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</body>
</html>