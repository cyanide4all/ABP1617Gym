<!--Eliasa 16/11/2016-->
<?php
require_once("../DB/connectDB.php");

class Reserva{

  private $db;

  public function __construct(){
    //Esto por alguna razon no funciona
    //$this->$db = DB::getDB();
  }

  function delReserva($idU,$idS){
    $db = DB::getDB();
    $consulta = "DELETE FROM Reserva WHERE Usuario_idUsuario =".$idU." and Sesion_idSesion =".$idS;
    $db->query($consulta);
  }

  function getIdUsuario($idSesion){
    $db = DB::getDB();
    $consulta = "SELECT Usuario_idUsuario FROM Reserva WHERE Sesion_idSesion = ".$idSesion;
    $result = $db->query($consulta);
    $res = array();
    while($row = $result->fetch_assoc()){
      array_push($res, $row);
    }
    return $res;
  }

  function getIdSesion($idUsuario){
    $db = DB::getDB();
    $consulta = "SELECT Sesion_idSesion FROM Reserva WHERE Usuario_idUsuario = ".$idUsuario;
    $result = $db->query($consulta);
    $res = array();
    while($row = $result->fetch_assoc()){
      array_push($res, $row);
    }
    return $res;
  }
  function addReserva($idU,$idS){
    $db = DB::getDB();
    $consulta = "INSERT INTO Reserva (Usuario_idUsuario,Sesion_idSesion)
                      VALUES ('".$idU."', '".$idS."')";
    $db->query($consulta);
  }
}
  ?>
