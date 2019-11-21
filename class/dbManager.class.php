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
      $q = $this->_db->prepare('INSERT INTO media_element(titre, description, note, fk_format, fk_type) VALUES(:titre, :description, :note, :fk_format, :fk_type)');

      $q->bindValue(':titre', $media->titre());
      $q->bindValue(':description', $media->description());
      $q->bindValue(':note', $media->note(), PDO::PARAM_INT);
      $q->bindValue(':fk_format', $media->fk_format(), PDO::PARAM_INT);
      $q->bindValue(':fk_type', $media->fk_type(), PDO::PARAM_INT);

      // Exécution de la requête.
      $q->execute();
  }

  public function update(Media $media)
  {
      // Prépare une requête de type UPDATE.
      $q = $this->_db->prepare('UPDATE media_element SET titre=:titre, description=:description, note=:note, fk_format=:fk_format, fk_type=:fk_type WHERE id=:id');

      $q->bindValue(':id', $media->id(), PDO::PARAM_INT);
      $q->bindValue(':titre', $media->titre());
      $q->bindValue(':note', $media->note(), PDO::PARAM_INT);
      $q->bindValue(':description', $media->description());
      $q->bindValue(':fk_format', $media->fk_format(), PDO::PARAM_INT);
      $q->bindValue(':fk_type', $media->fk_type(), PDO::PARAM_INT);

      $q->execute();
  }

  public function delete(Media $media)
  {
    // Exécute une requête de type DELETE
      $this->_db->exec('DELETE FROM media_element WHERE id = '.$media->id());
  }

  public function get($id)
  {
      $id = (int) $id;

      $q = $this->_db->query('SELECT *, media_element.id as media_id, type.nom as type_nom, format.nom as format_nom
                                FROM media_element
                                LEFT JOIN
                                    type ON
                                    media_element.fk_type = type.id
                                LEFT JOIN
                                    format ON
                                    media_element.fk_format = format.id
                                WHERE media_element.id='.$id);

      $donnees = $q->fetch(PDO::FETCH_ASSOC);

      print json_encode($donnees);
  }

  public function getList() // Retourne la liste de tous les medias.
  {
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
              case "fk_type":
                  $order_by = "type_nom";
                  break;
              case "fk_format":
                  $order_by = "format_nom";
                  break;
              default:
                  $order_by = "titre";
          }
      }

      $q = $this->_db->query('  SELECT *,
                                    media_element.id as media_id,
                                    type.nom as type_nom,
                                    format.nom as format_nom
                                FROM media_element
                                LEFT JOIN
                                    type ON
                                    media_element.fk_type = type.id
                                LEFT JOIN
                                    format ON
                                    media_element.fk_format = format.id
                                ORDER BY ' . $order_by . ' ASC');

      $rows = $q->fetchAll(PDO::FETCH_ASSOC);
      print json_encode($rows);
  }


  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}
