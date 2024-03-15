<?php
session_start();

$con = mysqli_connect("localhost" ,"root","","crud_php");

$res = mysqli_query($con, "SELECT * FROM student");

while($row = mysqli_fetch_assoc($res)){
    $data[] = $row;
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    
</head>
<body>    
    <table border="1">

    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <?php if(!empty($_SESSION['user'])): ?>
        <th>Update</th>
        <th>Delete</th>
        <?php endif; ?>
    </tr>

    
                <?php foreach($data as $student): ?>
                <tr>
                <td> <?= $student['id']; ?> </td>
                    <td> <?= $student['name']; ?> </td>
                    <td> <?= $student['email']; ?> </td>
                    <?php if(!empty($_SESSION['user'])): ?>
                    <td><a href="delete.php?id= <?= $student['id']; ?> ">Delete</a></td>
                    <td><a href="update.php?id= <?= $student['id'];?>">Update</a></td>
                    <?php endif; ?>
                </tr>   
                <?php endforeach; ?>
                    
    </table>

</body>
</html>
