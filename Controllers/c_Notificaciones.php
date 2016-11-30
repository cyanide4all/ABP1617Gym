<!-- Elias 17/11/2016 -->
<?php
require_once("c_Usuario.php");
require_once("../Model/Notificacion.php");
require_once("c_Actividad.php");

class NotificacionesController{

  public function crearNotificacionSesionNueva($mensaje, $idActividad){
    $usuariosController = new UsuarioController();
    $n = new Notificacion();
    $deportistas = $usuariosController->getDeportistas();
    date_default_timezone_set('Europe/Madrid');
    $date = date('Y-m-d H:i:s');
    foreach($deportistas as $d){
      $actividadController = new ActividadController();
      //TODO TODO TODO
      //Esto no es con getSesiones, solo se crea noticion si antes se reservo plaza en dicha actividad.
      //Hay que liarse con reservas y ahora paso
      //TODO TODO TODO
      $sesiones = $actividadController->getSesiones($d);
      $hue = false;
      foreach($sesiones as $s){
        if($s["Actividad_idActividad"]==$idActividad){
          $hue = true;
        }
      }
      if($hue){
        $n->create("Nuevas sesiones disponibles en tus actividades", $date, $d); //Mensaje super importante
      }
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
