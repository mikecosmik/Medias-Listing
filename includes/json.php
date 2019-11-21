<?php header('Access-Control-Allow-Origin: *');   ?>
<?php
include_once 'dbcon.php';

$manager = new dbManager($pdo);
$manager->getList();
?>
