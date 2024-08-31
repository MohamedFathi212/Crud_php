<?php
session_start();

$con = mysqli_connect("localhost", "root", "", "crud_php");

$res = mysqli_query($con, "SELECT * FROM student");

while ($row = mysqli_fetch_assoc($res)) {
    $data[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Student List</title>
</head>
<body class="container my-5">    
    <h1 class="mb-4">Student List</h1>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <?php if(isset($_SESSION['login'])): ?>
                <th>Update</th>
                <th>Delete</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($data)): ?>
                <?php foreach($data as $student): ?>
                <tr>
                    <td><?= $student['id']; ?></td>
                    <td><?= $student['name']; ?></td>
                    <td><?= $student['email']; ?></td>
                    <?php if(isset($_SESSION['login'])): ?>
                    <td><a class="btn btn-warning" href="update.php?id=<?= $student['id'];?>">Update</a></td>
                    <td><a class="btn btn-danger" href="delete.php?id=<?= $student['id']; ?>">Delete</a></td>
                    <?php endif; ?>
                </tr>   
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">No students found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <a class="btn btn-primary" href="login.php">Back</a>
</body>
</html>
