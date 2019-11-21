<?php
include('dbcon.php');

$id         =   $_GET['id'];
$titre          = "";
$description    = "";
$note           = "";
$fk_format      = "";
$fk_type        = "";

$media      =   new Media($id, $titre, $description, $note, $fk_format, $fk_type);


$db         =   new PDO("mysql:host=$host;dbname=$db", $user, $pass);
$manager    =   new dbManager($db);

$manager    ->  delete($media);
