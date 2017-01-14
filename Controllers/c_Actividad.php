<!--Raul 14/11/2016-->
<!--Controlador para actividad y sesion-->
<?php
require_once("../Model/Actividad.php");
require_once("../DB/connectDB.php");
require_once("c_Notificaciones.php");

//Metodos por defecto para los formularios
if(isset($_POST['idActividad']) || (isset($_GET['op']) && $_GET['op']==2)){

  if($_GET['op']==0){ //Eliminar
    ActividadController::delActividad($_POST['idActividad']);
  }if($_GET['op']==1){    //Modificar
    ActividadController::modActividad();
  }if($_GET['op']==2){		//Crear
  ActividadController::addActividad();
  }if($_GET['op']==3){		//Crear
  ActividadController::addSesion();
  }if($_GET['op']==4){		//Crear
  ActividadController::delSesion();
  }
}

class ActividadController{
  function __construct(){
  }
  public function gestionActividades(){
    $a = new Actividad();
    $actividades = $a->getNameAndID();
    return $actividades;
  }
  public function gestionActividadesConTipo(){
    $a = new Actividad();
    $actividades = $a->getNameIDType();
    return $actividades;

  }

  public static function delActividad($id){
    $a = new Actividad();
    $a->deleteActividad($id);
    header('Location: ' . $_SERVER['HTTP_REFERER']); //redirect pagina anterior
  }

  public static function addActividad(){
    if($_POST['tipoActividad'] == 'Individual'){
		  $num = 0;
	  }
		else{
		  $num = $_POST['numPlazas'];
		}

    $a = new Actividad();
    $a->createActividad($_POST['nomActividad'],$_POST['tipoActividad'],$num);

    $notificacionController = new NotificacionesController();
    $notificacionController->crearNotificacionActividadNueva();

  	header('Location: ../Views/GestionActividades.php');
  }

  public static function getActividad($id){
    $a = new Actividad();
    return $a->getById($id);
  }

//Enchufa todas las variables POST en base de datos
  public static function modActividad(){
    $a = new Actividad();

    if(!isset($_POST['tipoActividad'])){
      $tipo = "";
    }else{
      $tipo = $_POST['tipoActividad'];
  	  if($_POST['tipoActividad'] == 'Individual')
  	  {
  		  $num = 0;
  	  }
  		else{
  		  $num = $_POST['plazasActividad'];

  	  }
    }

    //HASYA AQUI
    $a->modificarActividad($_POST['idActividad'],$_POST['nomActividad'],$tipo,$num);
    header('Location: ../Views/GestionActividades.php');
    }

    public static function addSesion(){
        $a = new Actividad();
        $a->addSesion($_POST['idActividad'],$_POST['fecha']);
          header('Location: ' . $_SERVER['HTTP_REFERER']); //redirect pagina anterior
    }

    public function getSesiones($id){
      $a = new Actividad();
      $a->getSesiones($id);
      $result = $a->getSesiones($id);
      return $result;
    }

    public function delSesion(){
      $a = new Actividad();
      $a->delSesion($_POST['idSesion']);
      header('Location: ' . $_SERVER['HTTP_REFERER']); //redirect pagina anterior
    }

    public function quedanPlazas($id){
      $a = new Actividad();
      $sesion = $a->getSesion($id);
      $actividad = $a->getById($sesion['Actividad_idActividad']);
      $plazasTotales = $actividad['numPlazas'];
      $plazasOcupadas = $sesion['numPlazasOcupadas'];
      return ($plazasOcupadas < $plazasTotales);
    }

    public function plazaOcupada($id){
      $a = new Actividad();
      $a->ocuparPlazaEnSesion($id);
    }

    public function plazaLiberada($id){
      $a = new Actividad();
      $a->liberarPlazaEnSesion($id);
    }


    public function esGrupal($id){
      $a = new Actividad();
      $actividad = $a->getById($id);
      if($actividad['tipoAct']=="Grupal"){
        return true;
      }
      else{
        return false;
      }
    }

    public function getSesion($id){
      $a = new Actividad();
      return $a->getSesion($id);
    }
}
?>
