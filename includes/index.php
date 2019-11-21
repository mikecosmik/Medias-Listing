<?php
include_once 'dbcon.php';

$manager = new dbManager($pdo);
$manager->getList();
?>
