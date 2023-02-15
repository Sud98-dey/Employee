<?php
#Delete Employee record  
include 'connect.php';
if(isset($_GET['employeeId'])){
    $id = $_GET['employeeId'];
    $sql = "delete from `employees` where id=$id";
    $result = mysqli_query($connectDB,$sql);
    if($result){
        header('location:display.php');
    }
}
?>