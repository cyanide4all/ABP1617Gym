<!-- Raul 17/11/2016 -->
<?php
require_once("../Model/Estadistica.php");

require_once("../DB/connectDB.php");

require_once("../Controllers/c_Usuario.php");

if(!isset($_SESSION['userID'])){
  session_start();
}

if(isset($_POST['idTabla'])){
  EstadisticasController::generarEstadisticas();
}


//TODO lectura de estadisticas
class EstadisticasController{
  function __construct(){
  }

  public function contarEjercicios(){
    $ejerciciosHechos = $this->getEstadisticas();
    return count($ejerciciosHechos);
  }

  public function checkFecha10horas($date){
    date_default_timezone_set('Europe/Madrid');
    strtotime($date);
    time() - strtotime($date);
    //3 digito  son las horas que pasaron.
    if((time()-(60*60*10)) < strtotime($date)){
      return true;
    }else{
      return false;
    }
  }

  public static function generarEstadisticas(){
    $userController = new UsuarioController();
    $user = $userController->getUserByEmail($_SESSION['userID']);

    $i = 0;
    $e = new Estadistica();

    foreach ($_POST['arrayID'] as $it) {
      $done = 0;

      if(isset($_POST['arrayID'][$i]) && isset($_POST['arrayStats'][$i])){
        if($_POST['arrayStats'][$i]==1){
          $done=1;
        }
      }
      if($done == 1){
        date_default_timezone_set('Europe/Madrid');
        $date = date('Y-m-d H:i:s');
        $e->createEstat($_POST['arrayID'][$i], $_POST['idTabla'], $user['idUsuario'], $date, $_POST['comentario'][$i]); //chekar ultimos 2
      }
      $i++;
    }
    header('Location: ../Views/GestionTablas.php');
  }

  public function getEstadisticas(){
    $e = new Estadistica();
    $userController = new UsuarioController();
    $user = $userController->getUserByEmail($_SESSION['userID']);

    return $e->getEstadisticas($user['idUsuario']);  //TODO IMPLEMENT ME PLS I HABE CANCER
  }

  public function getSemana(){
    $e = new Estadistica();
    $userController = new UsuarioController();
    $user = $userController->getUserByEmail($_SESSION['userID']);

    return $e->getSemana($user['idUsuario']);
  }

}

?>
