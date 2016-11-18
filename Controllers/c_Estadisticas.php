<!-- Raul 17/11/2016 -->
<?php
require_once("../Model/Estadistica.php");

require_once("../DB/connectDB.php");

require_once("../Controllers/c_Usuario.php");

session_start();
//arreglar esto. // sesion esta guardando el nombre no el mail :^)

if(isset($_POST['idTabla'])){
  EstadisticasController::generarEstadisticas();
}


//TODO lectura de estadisticas
class EstadisticasController{
  function __construct(){
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
        $e->createEstat($_POST['arrayID'][$i], $_POST['idTabla'], $user['idUsuario'], $date); //chekar ultimos 2
      }
      $i++;
    }
  //  header('Location: ../Views/GestionTablas.php');
  }

}

?>
