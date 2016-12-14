<?php
require_once("../DB/connectDB.php");

class Notificacion{
  function __construct(){
  }
  function create($mensaje,$fecha,$idU){
    $db = DB::getDB();
    $consulta = "INSERT INTO Notificacion (contenido, fecha, Usuario_idUsuario) VALUES ('".$mensaje."', '".$fecha."', '".$idU."')";
    $db->query($consulta);
  }
  function deleteAll($idUsuario){
    $db = DB::getDB();
    $consulta = "DELETE FROM Notificacion WHERE Usuario_idUsuario=".$idUsuario; 
    $db->query($consulta);
  }


  function get($idUsuario){
    $db = DB::getDB();
    $consulta = "SELECT * FROM Notificacion WHERE Usuario_idUsuario=".$idUsuario;
    $result = $db->query($consulta);
    $res = array();
    while($row = $result->fetch_assoc()){
      array_push($res, $row);
    }
    return $res;
  }

}
