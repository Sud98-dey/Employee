<?php 
# Connect application to database server
$connectDB = new mysqli('localhost','root','','db');

if(!($connectDB)){
    die(mysqli_error($connectDB));
}
?>