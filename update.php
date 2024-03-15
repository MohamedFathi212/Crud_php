<?php

$id = $_GET['id'];


$con = mysqli_connect("localhost", "root", "", "crud_php");


$query = mysqli_query($con, "SELECT * FROM student WHERE id='$id'");
$row = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="stylesheet" href="css/stylee.css">
    <title>Update student</title>
</head>
<body>
    <form action="update_student.php" method="post">
        <!-- Hidden input field to store the student ID -->
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <h2>Update Student</h2>
        <input type="text" name="name" value="<?php echo $row['name']; ?>" placeholder="Enter your name">
        <input type="text" name="email" value="<?php echo $row['email']; ?>" placeholder="Enter your email">
        <input type="password" name="password" value="<?php echo $row['password']; ?>" placeholder="Enter your password">
        <input type="submit" name="update" value="Update Student">
    </form>
</body>
</html>