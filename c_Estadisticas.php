<!-- Raul 17/11/2016 -->
<?php
require_once("../Model/Estadistica.php");
require_once("../DB/connectDB.php");

//TODO TODA LA CLASE
class EstatController{
  function __construct(){
  }

}

$i = 0;
$e = new Estadistica();

foreach ($_POST['arrayID'] as $it) {
  $done = 0;
  if(isset($_POST['arrayStats'][$i])){
    $done=1;
  }

  if($done == 1){
    $e->createEstat($_POST['arrayID'][$i],$_POST['idTabla'],$_POST['idUser']); //chekar ultimos 2
  }
  $i++;
}
header('Location: ' . $_SERVER['HTTP_REFERER']);

?>
