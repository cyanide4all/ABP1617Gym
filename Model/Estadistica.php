<?php
require_once("../DB/connectDB.php");

class Estadistica{

  private $db;

  public function __construct(){
  }

  function createEstat($tabIdEj,$tabId,$uID){

    $db = DB::getDB();
    $consulta = "INSERT INTO Estadisticas (TablaEjercicio_Ejercicio_idEjercicio,TablaEjercicio_Tabla_idTabla,Usuario_idUsuario)
          VALUES ('".$tabIdEj."', '".$tabId."', '".$uID."')";

    $db->query($consulta);

  ///  echo('------------------');
  //  echo $consulta;


  }
}

?>
