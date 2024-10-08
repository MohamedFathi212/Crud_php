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
    <link rel="stylesheet" href="css/stylee.css">
    <title>Update Student</title>
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
        input[type="text"], input[type="password"] {
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
    <form action="update_student.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
        <h2>Update Student</h2>
        <input type="text" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" placeholder="Enter your name">
        <input type="text" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" placeholder="Enter your email">
        <input type="password" name="password" value="<?php echo htmlspecialchars($row['password']); ?>" placeholder="Enter your password">
        <input type="submit" name="update" value="Update Student">
    </form>
</body>
</html>
