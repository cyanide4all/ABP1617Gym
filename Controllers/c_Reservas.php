<!--Elias 1/1/2016-->
<?php
require_once("../Model/Actividad.php");
require_once("../Controllers/c_Usuario.php");
require_once("../Model/Reserva.php");
require_once("../DB/connectDB.php");
session_start();


//Metodos por defecto para los formularios
if(isset($_SESSION['userID'])&&isset($_POST['idActividad'])){
//Hacer reserva
//Listar reservas
//Borrar reservas
echo "hue";
  $userController = new UsuarioController();
  $user = $userController->getUserByEmail($_SESSION['userID']);
  echo $user;
  if($_GET['op']==0){ //Eliminar
    ReservaController::delReserva($_SESSION['userID'], $_POST['idActividad']);
  }
  if($_GET['op']==1){ //Eliminar
    echo($_SESSION['userID']);

    ReservaController::reservar($_SESSION['userID'], $_POST['idActividad']);
  }
}

class ReservaController{
  function __construct(){
  }

  public function gestionReservas(){
    $r = new Reserva();
    $reservas = $r->getIds();
    return $reservas;
}

  public static function delReserva($idU,$idS){
    $r = new Reserva();
    $r->delReserva($idU,$idS);
    header('Location: ' . $_SERVER['HTTP_REFERER']); //redirect pagina anterior
  }

  public static function reservar($idU,$idS){
    //TODO las comprobaciones necesarias
    $r = new Reserva();
    $r->addReserva($idU,$idS);
    header('Location: ' . $_SERVER['HTTP_REFERER']); //redirect pagina anterior


  }


}
?>
