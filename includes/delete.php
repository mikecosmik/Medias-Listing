<?php

include_once 'dbcon.php';

$stmt = $pdo->query('   DELETE FROM media_element WHERE media_element.id='.$_GET['id']);
$rows = $stmt->fetch(PDO::FETCH_ASSOC);
print json_encode($rows);
?>