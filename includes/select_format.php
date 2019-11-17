<?php 

include_once 'dbcon.php';
$stmt = $pdo->query('SELECT * FROM format ORDER BY id ASC');
//$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

while ($arr = $stmt->fetch()) {
    // do_other_stuff();
    echo "<option value='" . $arr['id'] . "'>" .$arr['nom']. "</option>"; 
}
//print json_encode($rows);
?>