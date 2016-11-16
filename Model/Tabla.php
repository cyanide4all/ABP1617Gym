<?php
require_once("../DB/connectDB.php");

class Tabla{

  private $db;

  public function __construct(){
    //Esto por alguna razon no funciona
    //$this->$db = DB::getDB();
  }

  function getNameAndID(){
    $db = DB::getDB();
    $consulta = "SELECT idTabla, nomTabla FROM Tabla";
    $result = $db->query($consulta);
    $res = array();
    while($row = $result->fetch_assoc()){
      array_push($res, $row);
    }
    return $res;
  }

  function deleteTabla($id){
    $db = DB::getDB();
    $consulta = "DELETE FROM Tabla WHERE idTabla =".$id;
    $db->query($consulta);
  }

  function getById($id){
    $db = DB::getDB();
    $consulta = "SELECT * FROM Tabla WHERE idTabla =".$id;
    $result = $db->query($consulta);
    return $result->fetch_assoc();
  }

  function getMaxID(){
    $db = DB::getDB();
    $consulta = "SELECT MAX(idTabla) as idTabla FROM Tabla";
    $result = $db->query($consulta);
    return $result->fetch_assoc();
  }

  function modificarTabla($id,$name,$desc){
    $db = DB::getDB();
    $consulta = "UPDATE Tabla SET nomTabla='".$name."',
                                      descripcion='".$desc.
                "' WHERE idTabla= '".$id."'";
    $db->query($consulta);
  }

  function createTabla($nombre, $desc){
	  $db = DB::getDB();
	  $consulta = "INSERT INTO Tabla (nomTabla, descripcion)
					VALUES ('".$nombre."', '".$desc."')";

	  $db->query($consulta);
  }

  function modEjerciciosTabla($idEjercicio,$idTabla,$numRepeticiones,$carga){
    $db = DB::getDB();
    $consulta = "INSERT INTO TablaEjercicio (Ejercicio_idEjercicio, Tabla_idTabla,nRepeticiones,carga)
                  VALUES ('".$idEjercicio."','".$idTabla."','".$numRepeticiones."','".$carga."')";
    $db->query($consulta);
  }

  function getEjercicios($id){
    $db = DB::getDB();
    $consulta = "SELECT Ejercicio_idEjercicio,nRepeticiones,carga FROM TablaEjercicio WHERE Tabla_idTabla='".$id."'";
    $result = $db->query($consulta);
    $res = array();
    while($row = $result->fetch_assoc()){
      array_push($res, $row);
    }
    return $res;
  }
  function deleteEjercicio($id){
    $db = DB::getDB();
    $consulta = "DELETE FROM TablaEjercicio WHERE Ejercicio_idEjercicio =".$id;
    $db->query($consulta);
  }

}
?>
