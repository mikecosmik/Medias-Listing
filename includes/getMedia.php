<?php

include_once 'dbcon.php';

$manager = new dbManager($pdo);

$id = $_GET['id'];

$manager->get($id);