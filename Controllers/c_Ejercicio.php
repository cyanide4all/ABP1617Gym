<?php
require_once("../Model/Ejercicio.php");
require_once("../DB/connectDB.php");

//Metodos por defecto para los formularios
if(isset($_POST['idEjercicio'])){

  if($_GET['op']==0){ //Eliminar
    EjercicioController::delEjercicio($_POST['idEjercicio']);
  }if($_GET['op']==1){              //Modificar
    EjercicioController::modEjercicio();
  }if($_GET['op']==2){		//Crear
	EjercicioController::addEjercicio();
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
    header('Location: ' . $_SERVER['HTTP_REFERER']); //redirect pagina anterior
  }

  public static function addEjercicio(){
	  $e = new Ejercicio();
	  $e->createEjercicio($_POST['nomEjercicio'],$_POST['desEjercicio'],$_POST["catEjercicio"]);
  	header('Location: ../Views/GestionEjercicios.php'); //redirect pagina anterior
  }

  public static function getEjercicio($id){
    $e = new Ejercicio();
    return $e->getById($id);
  }

//Enchufa todas las variables POST en base de datos
  public static function modEjercicio(){
    $e = new Ejercicio();
    if(!isset($_POST['descripcion'])){
      $desc = "";
    }else{
      $desc = $_POST['descripcion'];
    }
    //Este bloque puede borrarse cuando el combobox de categorías se implemente
    if(!isset($_POST['categoria'])){
      $cat = "";
    }else{
      $cat = $_POST['categoria'];
    }
    //HASYA AQUI
    $e->modificarEjercicio($_POST['idEjercicio'],$_POST['nomEjercicio'],$desc,$cat);
    header('Location: ../Views/GestionEjercicios.php');
    }

}





 ?>
