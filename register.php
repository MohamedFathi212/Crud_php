<?php 
if(isset($_POST['add'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $con = mysqli_connect("localhost", "root", "", "crud_php");

    $query = "INSERT INTO `student` (`name`, `email`, `password`) VALUES ('$name', '$email', '$password')";

    $result = mysqli_query($con, $query);

    if($result){
        echo "Student has been inserted.";
        sleep(1);
        header("location:login.php");
    } else {
        echo "Student has not been inserted.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylee.css">
    <title>Register Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        form {
            background-color: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        h2 {
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
            text-align: center;
            color: #333;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 0.75rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 0.75rem;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            font-size: 1rem;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <form action="" method="post"> 
        <h2>Add Student</h2>
        <input type="text" name="name" placeholder="Enter your Name" required>
        <input type="email" name="email" placeholder="Enter your Email" required>
        <input type="password" name="password" placeholder="Enter your Password" required>
        <input type="submit" name="add" value="Add Student">
    </form>
</body>
</html>
