<?php
require_once("../DB/connectDB.php");

class Usuario{
  private $db = null;
  function __construct(){

  }

  function getUsuarios(){
    $db = DB::getDB();
    $consulta = "SELECT idUsuario, nomUsuario, direccion, telefono, tipoTarjeta, dni, fechaNac, email, pass FROM Usuario";
    $result = $db->query($consulta);
    $res = array();
    while($row = $result->fetch_assoc()){
      array_push($res, $row);
    }
    return $res;
  }

  function deleteUsuario($id){
    $db = DB::getDB();
    $consulta = "DELETE FROM Usuario WHERE idUsuario =".$id;
    $result = $db->query($consulta);
  }

  function getById($id){
    $db = DB::getDB();
    $consulta = "SELECT * FROM Usuario WHERE idUsuario =".$id;
    $result = $db->query($consulta);
    return $result->fetch_assoc();
  }

  function modificarUsuario($id,$nameU,$direc,$telf,$tipoT){
    $db = DB::getDB();
    $consulta = "UPDATE Usuario SET nomUsuario='".$nameU."',
                                      direccion='".$direc."',
                                      tipoTarjeta='".$tipoT."',
                                      telefono='".$telf.
                "' WHERE idUsuario= '".$id."'";
    $result = $db->query($consulta);
  }

  function createUsuario($nombre, $direc, $telf, $tipoT, $dni, $fechaNac, $email, $pass){
	  $db = DB::getDB();
	  $consulta = "INSERT INTO Usuario (nomUsuario, direccion, telefono, tipoTarjeta, dni, fechaNac, email, pass)
					VALUES ('".$nombre."', '".$direc."', '".$telf."', '".$tipoT."', '".$dni."', '".$fechaNac."', '".$email."', '".$pass."')";

	  $result = $db->query($consulta);
  }

  function tryLogin($username,$pass){
    $db = DB::getDB();
	  $consulta ="SELECT * FROM Usuario WHERE nomUsuario='".$username."' AND pass = '".$pass."'";
    $result = $db->query($consulta);
    if($result->num_rows==0){
      return false;
    }
      return true;
    }

    function getByEmail($email){
      $db = DB::getDB();
      $consulta ="SELECT idUsuario FROM Usuario WHERE email='".$email;
      $result = $db->query($consulta);
      return $result;
    }
}
?>
