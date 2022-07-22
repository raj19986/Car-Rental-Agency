<?php 
session_start();
$servername="localhost";
$username="gogange_caragency";
$password="caragency";
$databse="gogange_caragency";
// creating datbase connection
$conn=mysqli_connect($servername,$username,$password,$databse);
// checck connnection
if(!$conn ){
    die("Failed To connect".mysqli_connect_error());
}

?>