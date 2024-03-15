<?php 


$id = $_GET['id'];

$con = mysqli_connect("localhost" ,"root","","crud_php");

$res = mysqli_query($con, "DELETE  FROM student WHERE `id` = '$id' ");

if(mysqli_affected_rows($con) > 0 ) {
    sleep(5); 
   header("location:index.php");
}else{
    echo "<script> alert('Has not  Deleted')</script>";

}
