<?php
class dbManager
{
  private $_db; // Instance de PDO.

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function add(Media $media)
  {
    // Préparation de la requête d'insertion.
    // Assignation des valeurs pour le nom, la force, les dégâts, l'expérience et le niveau du personnage.
    // Exécution de la requête.¸
      $q = $this->_db->prepare('INSERT INTO personnages(nom, forcePerso, degats, niveau, experience) VALUES(:nom, :forcePerso, :degats, :niveau, :experience)');
      
      $q->bindValue(':titre', $media->titre());
      $q->bindValue(':description', $media->description());
      $q->bindValue(':note', $media->note(), PDO::PARAM_INT);
      $q->bindValue(':fk_format', $fk_format->fk_format(), PDO::PARAM_INT);
      $q->bindValue(':fk_type', $media->type(), PDO::PARAM_INT);
      
      $q->execute();
  }

  public function delete(Media $media)
  {
    // Exécute une requête de type DELETE.
      $this->_db->exec('DELETE FROM media_element WHERE id = '.$media->id());
  }

  public function get($id)
  {
    // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Personnage.
      $media = [];
      
      $q = $this->_db->query('SELECT id, nom, forcePerso, degats, niveau, experience FROM media_element ORDER BY nom');
      
      while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
      {
          $persos[] = new Personnage($donnees);
      }
  }

  public function getList()
  {
    // Retourne la liste de tous les medias.
      $medias = [];    
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
      
      
      
      $q = $this->_db->query('  SELECT *, media_element.id as media_id, type.nom as type_nom, format.nom as format_nom
                                    FROM media_element
                                    LEFT JOIN
                                    type ON
                                    media_element.fk_type = type.id
                                    LEFT JOIN
                                    format ON
                                    media_element.fk_format = format.id
                                ORDER BY ' . $order_by . ' ASC');
      
      while ($medias = $q->fetch(PDO::FETCH_ASSOC))
      {
          $medias[] = new Media($medias);
      }
      
      print json_encode($medias);
  }

  public function update(Personnage $perso)
  {
    // Prépare une requête de type UPDATE.
    // Assignation des valeurs à la requête.
    // Exécution de la requête.
      $q = $this->_db->prepare('UPDATE personnages SET forcePerso = :forcePerso, degats = :degats, niveau = :niveau, experience = :experience WHERE id = :id');
      
      $q->bindValue(':forcePerso', $perso->forcePerso(), PDO::PARAM_INT);
      $q->bindValue(':degats', $perso->degats(), PDO::PARAM_INT);
      $q->bindValue(':niveau', $perso->niveau(), PDO::PARAM_INT);
      $q->bindValue(':experience', $perso->experience(), PDO::PARAM_INT);
      $q->bindValue(':id', $perso->id(), PDO::PARAM_INT);
      
      $q->execute();
  }
  
  public function hydrate(array $donnees)
  {
      foreach ($donnees as $key => $value)
      {
          // On récupère le nom du setter correspondant à l'attribut.
          $method = 'set'.ucfirst($key);
          
          // Si le setter correspondant existe.
          if (method_exists($this, $method))
          {
              // On appelle le setter.
              $this->$method($value);
          }
      }
  }
  // …

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}