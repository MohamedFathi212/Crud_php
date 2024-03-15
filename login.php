<?php

session_start();

if (isset($_POST['Add'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $con = mysqli_connect("localhost" ,"root","","crud_php");



    $query = "INSERT INTO student (name, email, password) VALUES ('$name', '$email','$password')";
    $sql = mysqli_query($con, $query);
    sleep(5);

    if ($sql) {
        echo "<script> alert('Student has been added')</script>";
    } else {
        echo "<script> alert('Student has not been added')</script>";
    }


    
    $query = mysqli_query($con, "SELECT * FROM student WHERE `name` = '$name' && `email` ='$email' && `password` = '$password' ");

    $res = mysqli_num_rows($query);

    if($res == 1) {
        $_SESSION['user'] = $email;
        header("location:index.php");
    }else{
        echo "<script> alert('name , email and password is not valid' )</script>";
    }





}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="stylesheet" href="css/stylee.css">
    <title>login</title>
</head>
<body>
    <form action="login.php" method="post">
        <h2>Add Student</h2>
        <input type="text" name="name" placeholder="Enter your name">
        <input type="text" name="email" placeholder="Enter your email">
        <input type="password" name="password" placeholder="Enter your password">
        <input type="submit" name="Add" value="Add Student">
    </form>
</body>
</html>

