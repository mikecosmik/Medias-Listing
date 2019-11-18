<?php
include_once 'dbcon.php';

$media = new Media([
  'titre' => '',
  'description' => 5,
  'note' => 0,
  'fk_format' => 1,
  'fk_type' => 0
]);
    
$db = new PDO('mysql:host=localhost;dbname=personnages', 'root', '');
$manager = new dbManager($db);

$manager->add($media);

echo "<pre>";
print_r( $manager->getList() );
echo "</pre>";