<?php
function chargerClasse($classe)
{
    require '../class/' .$classe . '.class.php'; // On inclut la classe correspondante au paramÃ¨tre passÃ©.
    
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelÃ©e dÃ¨s qu'on instanciera une classe non dÃ©clarÃ©e.

$host = '127.0.0.1';
$db   = 'medias';
$user = 'root';
$pass = '';
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