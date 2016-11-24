<!-- Raul 18/11/2016 -->
<?php
require_once("../DB/connectDB.php");

class Estadistica{

  private $db;

  public function __construct(){
  }

  function createEstat($tabIdEj,$tabId,$uID, $fecha){

    $db = DB::getDB();

    $consulta = "INSERT INTO Estadisticas (TablaEjercicio_Ejercicio_idEjercicio,TablaEjercicio_Tabla_idTabla,Usuario_idUsuario,fecha)
          VALUES ('".$tabIdEj."', '".$tabId."', '".$uID."', '".$fecha."')";

    $db->query($consulta);

  }

  function getEstadisticas($id){
    $db = DB::getDB();
    $consulta = "SELECT * FROM Estadisticas WHERE Usuario_idUsuario =".$id;
    $result = $db->query($consulta);

    $res = array();

    while($row = $result->fetch_assoc()){
      array_push($res, $row);
    }

    return $res;
  }

  function getSemana($id){
    $db = DB::getDB();

    $consulta = "SELECT COUNT(fecha) AS cont FROM Estadisticas
    WHERE Usuario_idUsuario =".$id." AND fecha between adddate(now(),-7) and now() ";

    $result = $db->query($consulta);

    return $result->fetch_assoc();
  }
}

?>
