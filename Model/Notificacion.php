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

  

}
