<?php

include_once 'dbcon.php';

$order_by = 'titre';

$stmt = $pdo->query('   SELECT *, media_element.id as media_id, type.nom as type_nom, format.nom as format_nom
                        FROM media_element 
                        LEFT JOIN
                        type ON
                        media_element.fk_type = type.id
                        LEFT JOIN
                        format ON
                        media_element.fk_format = format.id
                        WHERE media_element.id='.$_GET['id']);
$rows = $stmt->fetch(PDO::FETCH_ASSOC);
print json_encode($rows);
?>