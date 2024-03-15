<?php
if (isset($_POST['update'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

$con = mysqli_connect("localhost" ,"root","","crud_php");


    $sql = "UPDATE student SET name='$name', email='$email', password='$password' WHERE id='$id'";
    $res = mysqli_query($con, $sql);

    if ($res) {
        echo "Record updated successfully";
        sleep(5);
        header("location:index.php");
    } else {
        echo "Error updating student " ;
    }
}
?>