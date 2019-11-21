<?php header('Access-Control-Allow-Origin: *');
include_once 'dbcon.php';

$media = new Media([
  'titre' => '',
  'description' => 5,
  'note' => 0,
  'fk_format' => 1,
  'fk_type' => 0
]);

$db = new PDO('mysql:host=sql112.epizy.com;dbname=b7_24824496_medias', 'b7_24824496', 'dd05fekuy1Rhv');
$manager = new dbManager($db);

$manager->add($media);

echo "<pre>";
print_r( $manager->getList() );
echo "</pre>";
