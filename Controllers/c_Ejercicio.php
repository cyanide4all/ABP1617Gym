<?php
require_once("../Model/Ejercicio.php");
require_once("../DB/connectDB.php");
class EjercicioController{
  function __construct(){
  }
  public function gestionEjercicios(){

    $e = new Ejercicio();

    $ejercicios = $e->getNameAndID();

    return $ejercicios;
  }

}





 ?>
