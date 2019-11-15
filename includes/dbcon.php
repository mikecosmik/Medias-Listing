<?php 

$con = mysqli_connect("localhost","root","", "sample_info");

if(mysqli_connect_errno()){
    echo "Échec à la connexion à MySQL: " . mysqli_connect_errno();
}
?>