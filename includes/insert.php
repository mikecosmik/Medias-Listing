<?php


function chargerClasse($classe)
{
    require '/class/' .$classe . '.class.php'; // Inclusion de la classe correspondante au paramètre passé.

}



spl_autoload_register('chargerClasse'); // Enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.


$media = new Media([
  'titre' => '',
  'description' => 5,
  'note' => 0,
  'fk_format' => 1,
  'fk_type' => 0
]);
    
$db = new PDO('mysql:host=localhost;dbname=personnages', 'root', '');
$manager = new dbManager($db);

$manager->add($media);

echo "<pre>";
print_r( $manager->getList() );
echo "</pre>";