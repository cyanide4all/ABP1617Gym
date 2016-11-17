<!-- Raul 17/11/2016 -->
<?php
require_once("../Model/Estadistica.php");
require_once("../DB/connectDB.php");
require_once("../Controllers/c_Usuario.php");

session_start();

$userController = new UsuarioController();
$user = $userController->getUserByEmail($_SESSION['userID']);
//TODO TODA LA CLASE
class EstatController{
  function __construct(){
  }

}

$i = 0;
$e = new Estadistica();

foreach ($_POST['arrayID'] as $it) {
  $done = 0;

  if(isset($_POST['arrayStats'][$i])&&isset($_POST['arrayID'][$i])){
    $done=1;
  }

  if($done == 1){ //$_POST['arrayID'][$i] da problemas Why?????
  $e->createEstat($_POST['arrayID'][$i],$_POST['idTabla'],$user['idUsuario']); //chekar ultimos 2
  echo('<br> - Paso'.$i." Da : <br> ".$_POST['arrayID'][$i]." -- ".$_POST['idTabla']." -- ".$user['idUsuario']);
  }
  $i++;

}

//header('Location: ' . $_SERVER['HTTP_REFERER']);

?>
