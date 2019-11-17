<?php
class Media
{
  private $_titre;
  private $_description;
  private $_note;
  private $_fk_format;
  private $_fk_type;

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
  
  public function fk_format()
  {
      return $this->_fk_formats;
  }
  
  public function fk_type()
  {
      return $this->_fk_type;
  }
  
  ////////////////////
  // Liste des setters
  
  
  public function setTitre($titre)
  {
      // On vérifie qu'il s'agit bien d'une chaîne de caractères.
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
?>