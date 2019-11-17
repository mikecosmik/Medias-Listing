<?php

include_once 'dbcon.php';

$order_by = 'titre';

//filtrer les possibles valeurs de order_by
if(isset($_GET['order_by'])){
    switch ($_GET['order_by']) {
        case "titre":
            $order_by = "titre";
            break;
        case "description":
            $order_by = "description";
            break;
        case "note":
            $order_by = "note";
            break;
        case "type":
            $order_by = "type_nom";
            break;
        case "format":
            $order_by = "format_nom";
            break;
        default:
            $order_by = "titre";
    }
}



$stmt = $pdo->query('   SELECT *, media_element.id as media_id, type.nom as type_nom, format.nom as format_nom
                        FROM media_element 
                        LEFT JOIN
                        type ON
                        media_element.fk_type = type.id
                        LEFT JOIN
                        format ON
                        media_element.fk_format = format.id
                        ORDER BY ' . $order_by . ' ASC');
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
print json_encode($rows);


?>