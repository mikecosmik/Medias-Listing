<?php
include('dbcon.php');

$id         =   $_GET['id'];
$media      =   new Media($id);

$db         =   new PDO('mysql:host=localhost;dbname=medias', 'root', '');
$manager    =   new dbManager($db);

$manager    ->  delete($media);
