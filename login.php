<?php
session_start();

if (isset($_POST['view'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $con = mysqli_connect("localhost", "root", "", "crud_php");

    // استخدام استعلام محضر لتجنب حقن SQL
    $stmt = $con->prepare("SELECT * FROM student WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $res = $stmt->get_result()->fetch_assoc();

    if ($res) {
        $_SESSION['login'] = true;  // تم تعديل القيمة إلى true
        header("Location: index.php");
        exit();
    } else {
        echo "<script>alert('Email or password is not valid');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Login</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .login-container {
            background: #ffffff;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 0 1rem rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2 class="text-center mb-4">Login</h2>
        <a class="btn btn-success mb-3 d-block mx-auto" href="register.php">Register</a>
        <form action="login.php" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" name="view" class="btn btn-primary w-100">View Students</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
