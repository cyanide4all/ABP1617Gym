<?php
require_once("../Model/Tabla.php");
require_once("../DB/connectDB.php");
require_once("c_Notificaciones.php");

//Metodos por defecto para los formularios
if(isset($_POST['idTabla'])){

  if($_GET['op']==0){   //Eliminar
    TablaController::delTabla($_POST['idTabla']);
  }if($_GET['op']==1){  //Modificar
    TablaController::modTabla();
  }if($_GET['op']==2){	//Crear
	  TablaController::addTabla();
  }if($_GET['op']==3){	//Crear
	  TablaController::addEjerciciosTabla();
  }if($_GET['op']==4){	//Crear
    TablaController::delEjerciciosTabla();
  }if($_GET['op']==5){	//Crear
    TablaController::modEjerciciosTabla();
  }
}
//TODO TODA LA CLASE
class TablaController{
  function __construct(){
  }
  public function gestionTablas(){
    $t = new Tabla();
    $tablas = $t->getNameAndID();
    return $tablas;
  }

  public static function delTabla($id){
    $t = new Tabla();
    $t->deleteTabla($id);
    header('Location: ' . $_SERVER['HTTP_REFERER']); //redirect pagina anterior
  }

  public static function addTabla(){
	  $t = new Tabla();
	  $t->createTabla($_POST['nomTabla'],$_POST['desTabla']);
    $notificacionController = new NotificacionesController();
    $notificacionController->crearNotificacionTablaNueva();
    header('Location: ../Views/ModEjerciciosTabla.php?id='.$_POST['idTabla']);
  }

  public static function getTabla($id){
    $t = new Tabla();
    return $t->getById($id);
  }

  public static function getMaxID(){
    $t = new Tabla();
    return $t->getMaxID();
  }
//Enchufa todas las variables POST en base de datos
  public static function modTabla(){
    $t = new Tabla();
    if(!isset($_POST['desTabla'])){
      $desc = "";
    }else{
      $desc = $_POST['desTabla'];
    }
    //HASYA AQUI
    $t->modificarTabla($_POST['idTabla'],$_POST['nomTabla'],$desc);
    header('Location: ../Views/GestionTablas.php');
    }

    //Hermosa funcion extra que ahorra construir un controller entero
    public static function addEjerciciosTabla(){
      $t = new Tabla();
      //Seguramente haga falta alguna comprobacion o puesta a null aqui
      $t->addEjerciciosTabla($_POST['idEjercicio'],$_POST['idTabla'],$_POST['numRepeticiones'],$_POST['carga']);
      header('Location: ' . $_SERVER['HTTP_REFERER']); //redirect pagina anterior
    }

    public function getEjerciciosTabla($id){
        $t = new Tabla();
        $toRet = $t->getEjercicios($id);
        return $toRet;
    }

    public static function delEjerciciosTabla(){
      $t = new Tabla();
      $t->deleteEjercicio($_POST['idEjercicio'], $_POST['idTabla']);
      header('Location: ' . $_SERVER['HTTP_REFERER']); //redirect pagina anterior

    }

    public static function modEjerciciosTabla(){
        $t = new Tabla();
        if(!isset($_POST['nRepeticiones'])){
          $nRep = 0;
        }else{
          $nRep = $_POST['nRepeticiones'];
        }
        if(!isset($_POST['carga'])){
          $carga = 0;
        }else{
          $carga = $_POST['carga'];
        }
        //HASYA AQUI
        $t->modEjerciciosTabla($_POST['idTabla'],$_POST['idEjercicio'],$nRep,$carga);
        header('Location: ' . $_SERVER['HTTP_REFERER']); //redirect pagina anterior
    }
}

?>
