<?php
require_once("../DB/connectDB.php");

class Usuario{
  private $db = null;
  function __construct(){

  }

  function getUsuarios(){
    $db = DB::getDB();
    $consulta = "SELECT idUsuario, nomUsuario, direccion, telefono, tipoTarjeta, dni, fechaNac, email, pass, tipoUsuario FROM Usuario";
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

  function modificarUsuario($id,$nameU,$direc,$telf,$tipoT,$tipoU){
    $db = DB::getDB();
    $consulta = "UPDATE Usuario SET nomUsuario='".$nameU."',
                                      direccion='".$direc."',
                                      tipoTarjeta='".$tipoT."',
                                      telefono='".$telf."',
                                      tipoUsuario='".$tipoU.
                "' WHERE idUsuario= '".$id."'";
    $result = $db->query($consulta);
  }

  function modificarUsuarioP($id,$direc,$telf){
    $db = DB::getDB();
    $consulta = "UPDATE Usuario SET   direccion='".$direc."',
                                      telefono='".$telf.
                "' WHERE email = '".$id."'";
                echo $consulta;
    $result = $db->query($consulta);
  }

  function createUsuario($nombre, $direc, $telf, $tipoT, $dni, $fechaNac, $email, $pass, $tipoU){
	  $db = DB::getDB();
	  $consulta = "INSERT INTO Usuario (nomUsuario, direccion, telefono, tipoTarjeta, dni, fechaNac, email, pass, tipoUsuario)
					VALUES ('".$nombre."', '".$direc."', '".$telf."', '".$tipoT."', '".$dni."', '".$fechaNac."', '".$email."', '".$pass."','".$tipoU."')";

	  $result = $db->query($consulta);
  }

  function tryLogin($username,$pass){
    $db = DB::getDB();
	  $consulta ="SELECT * FROM Usuario WHERE email='".$username."' AND pass = '".$pass."'";
    $result = $db->query($consulta);
    if($result->num_rows==0){
      return false;
    }
      return true;
    }

    function getByEmail($email){
      $db = DB::getDB();
      $consulta = "SELECT * FROM Usuario WHERE email ='".$email."'";
      $result = $db->query($consulta);
      return $result->fetch_assoc();
    }

    function findByType($tipo){
      $db = DB::getDB();
      $consulta = "SELECT idUsuario FROM Usuario WHERE tipoUsuario ='".$tipo."'";
      $result = $db->query($consulta);
      $res = array();
      while($row = $result->fetch_array()){
        array_push($res, $row);
      }
      return $res;
    }

}
?>
