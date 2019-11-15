<?php 
include('dbcon.php');

$firstName  = $_POST['firstname']; 
$lastName   = $_POST['lastname'];
$contact    = $_POST['contact'];
$email      = $_POST['email'];

$insert = mysqli_query($con, "insert into customer_info(firstname, lastname, contact, email) values ('$firstName','$lastName','$contact','$email')");

if($insert){
    echo "1";
}else{
    echo "0";
}

mysqli_close($con);

?>