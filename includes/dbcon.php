<?php

include('../class/dbManager.class.php');
include('../class/media.class.php');

/*
function chargerClasse($classe)
{
    require '../class/' .$classe . '.class.php'; // On inclut la classe correspondante au paramÃ¨tre passÃ©.

}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelÃ©e dÃ¨s qu'on instanciera une classe non dÃ©clarÃ©e.
*/
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

if(strpos($url, "localhost")==true || strpos($url, "127.0.0.1")==true){
    $host = 'localhost';
    $db   = 'medias';
    $user = 'root';
    $pass = 'toor';
}else{
    $host = 'fdb17.your-hosting.net';
    $db   = '3231814_medias';
    $user = '3231814_medias';
    $pass = '12singes';
}



$charset = 'utf8';


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
?>
