<?php
ini_set('display_errors', '1');
  require '../mod/collector.php';
  require 'becario.php';

class ColectorBecario{


  public function addBecario($becario){
     
     return self::execQuery("INSERT INTO becario(nombre) VALUES('".$becario->getNombre()."')");
    
  }

 public function readAllBecario(){

      return self::read('becario','Becario');


  }
public function updateBecario($becario)
   {
    try
    {
      self::execQuery("UPDATE becario SET id='".$becario->getId()."',nombre='".$becario->getNombre()."' WHERE id=".$becario->getId());

     return true;
    }

public function deleteBecario($becario)
   {
    try
    {
      self::execQuery("DELETE FROM becario WHERE id=".$becario);

     return true;
    }
    catch(PDOException $e)
    {
     echo $e->getMessage();
     return false;
    }
   }


}
