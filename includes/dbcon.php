<?php

$con = mysqli_connect("localhost","root","", "medias");

if(mysqli_connect_errno()){
    echo "Échec à la connexion à MySQL: " . mysqli_connect_errno();
}
?>