<?php
require_once("../Model/Ejercicio.php");
require_once("../DB/connectDB.php");

//Metodos por defecto para los formularios
if(isset($_POST['idEjercicio'])){

  if($_GET['op']==0){ //Eliminar
    EjercicioController::delEjercicio($_POST['idEjercicio']);
  }else{              //Modificar
    EjercicioController::modEjercicio($_POST['idEjercicio']);
  }
}



class EjercicioController{
  function __construct(){
  }
  public function gestionEjercicios(){
    $e = new Ejercicio();
    $ejercicios = $e->getNameAndID();
    return $ejercicios;
  }

  public static function delEjercicio($id){
    $e = new Ejercicio();
    $e->deleteEjercicio($id);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }

  public static function getEjercicio($id){
    $e = new Ejercicio();
    return $e->getById($id);
  }

  public static function modEjercicio($id){
    $e = new Ejercicio();
    //$e->modificarEjercicio($id,$_POST['nomEjercicio'],$_POST['descripcion'],$_POST['categoria']);
    $e->modificarEjercicio($id,"nada","nada","nada");
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    //ToDo

    //Enchufa todas las variables POST en base de datos
  }

}





 ?>
