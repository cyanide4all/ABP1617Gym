<!-- Elias 17/11/2016 -->
<?php
require_once("c_Usuario.php");
require_once("../Model/Notificacion.php");
require_once("c_Actividad.php");

//Por aqui entra el formulario de borrar notificaciones
if(!isset($_SESSION['userID'])){
  session_start();
}
if(isset($_SESSION['userID'])){
  $userController = new UsuarioController();
  $user = $userController->getUserByEmail($_SESSION['userID']);
  NotificacionesController::borrarNotificaciones($user["idUsuario"]);
}



class NotificacionesController{

  //@UNTESTED
  public static function borrarNotificaciones($idUsuario){
    $n = new Notificacion();
    $n->deleteAll($idUsuario);
  }

  public function getNotificaciones($idUsuario){
    if(!isset($_SESSION['userID'])){
      session_start();
    }
    if(isset($_SESSION['userID'])){
      $userController = new UsuarioController();
      $user = $userController->getUserByEmail($_SESSION['userID']);
    }
    $n = new Notificacion();
    $n->get($idUsuario);
  }

  public function crearNotificacionSesionNueva($mensaje, $idActividad){
    $usuariosController = new UsuarioController();
    $n = new Notificacion();
    $deportistas = $usuariosController->getDeportistas();
    date_default_timezone_set('Europe/Madrid');
    $date = date('Y-m-d H:i:s');
    foreach($deportistas as $d){
      /* //CODIGO POCHO
      $actividadController = new ActividadController();
      //TODO TODO TODO
      //DE MOMENTO QUEDA ASI PORQUE PASANDING peeeeeeeero...
      //Esto no es con getSesiones, solo se crea noticion si antes se reservo plaza en dicha actividad.
      //Hay que liarse con reservas y ahora paso.
      //TODO TODO TODO
      $sesiones = $actividadController->getSesiones($d);
      $hue = false;
      foreach($sesiones as $s){
        if($s["Actividad_idActividad"]==$idActividad){
          $hue = true;
        }
      }
      if($hue){
      */
        $n->create("Nuevas sesiones disponibles en nuestras actividades", $date, $d); //Mensaje super importante
      //}
    }
  }

  public function crearNotificacionTablaNueva(){
    $usuariosController = new UsuarioController();
    $n = new Notificacion();
    $deportistas = $usuariosController->getDeportistas();
    date_default_timezone_set('Europe/Madrid');
    $date = date('Y-m-d H:i:s');
    foreach($deportistas as $d){
      $n->create("Nuevas tablas de ejercicios disponibles", $date, $d); //Mensaje super importante
    }
  }

  public function crearNotificacionActividadNueva(){
    $usuariosController = new UsuarioController();
    $n = new Notificacion();
    $deportistas = $usuariosController->getDeportistas();
    date_default_timezone_set('Europe/Madrid');
    $date = date('Y-m-d H:i:s');
    foreach($deportistas as $d){
      $n->create("Nuevas actividades disponibles", $date, $d); //Mensaje super importante
    }
  }

}







?>
