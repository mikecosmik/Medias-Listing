<?php 

include_once 'dbcon.php';
$stmt = $pdo->query('SELECT * FROM type ORDER BY id ASC');

while ($arr = $stmt->fetch()) {
    echo "<option value='" . $arr['id'] . "'>" .$arr['nom']. "</option>"; 
}
?>