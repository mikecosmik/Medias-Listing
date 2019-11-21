<?php

include('dbcon.php');

$id             = $_POST['id'];
$titre          = $_POST['titre'];
$description    = $_POST['description'];
$note           = $_POST['note'];
$fk_format      = $_POST['fk_format'];
$fk_type        = $_POST['fk_type'];

$media      =   new Media($id, $titre, $description, $note, $fk_format, $fk_type);
$db         =   new PDO("mysql:host=$host;dbname=$db", $user, $pass);
$manager    =   new dbManager($db);

if( $_POST['update'] == "0" ){
    $manager    ->  add($media);
}else{
    $manager    ->  update($media);
}
