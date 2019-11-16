<?php

$host = '127.0.0.1';
$db   = 'medias';
$user = 'root';
$pass = '';
$charset = 'utf8';

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
        default:
            $order_by = "titre";
    }
}

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$stmt = $pdo->query('SELECT * FROM media_element ORDER BY ' . $order_by . ' ASC');
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
print json_encode($rows);


?>