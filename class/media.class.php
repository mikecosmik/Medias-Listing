<?php
class Media
{
  private $_titre;
  private $_description;
  private $_note;
  private $_fk_format;
  private $_fk_type;
  
  public function __construct($id, $titre, $description, $note, $fk_format, $fk_type)
  {      
      $this->setId($id);
      $this->setTitre($titre);
      $this->setNote($note);
      $this->setDescription($description);
      $this->setFKFormat($fk_format);
      $this->setFKType($fk_type);
  }
  

  ////////////////////
  // Liste des getters
  
  public function id()
  {
      return $this->_id;
  }
  
  public function titre()
  {
      return $this->_titre;
  }
  
  public function description()
  {
      return $this->_description;
  }
  
  public function note()
  {
      return $this->_note;
  }
  
  public function fk_format()
  {
      return $this->_fk_format;
  }
  
  public function fk_type()
  {
      return $this->_fk_type;
  }
  
  ////////////////////
  // Liste des setters
  public function setId($id)
  {
      // Convertit l'argument en nombre entier si c'en était déjà un, rien ne change
      $id = (int) $id;
      
      // Nombre est bien strictement positif
      if ($id > 0)
      {
          $this->_id = $id;
      }
  }
  
  public function setTitre($titre)
  {
      // Vérifie qu'il s'agit bien d'un string
      if (is_string($titre))
      {
          $this->_titre = $titre;
      }
  }
  
  public function setNote($note)
  {
      $note = (int) $note;
      $this->_note = $note;
  }
  
  public function setDescription($description)
  {
      // On vérifie qu'il s'agit bien d'une chaîne de caractères.
      if (is_string($description))
      {
          $this->_description = $description;
      }
  }
  
  public function setFKFormat($fk_format)
  {
      $fk_format = (int) $fk_format;
      $this->_fk_format = $fk_format;
  }
  
  public function setFKType($fk_type)
  {
      $fk_type = (int) $fk_type;
      $this->_fk_type = $fk_type;
  }
}