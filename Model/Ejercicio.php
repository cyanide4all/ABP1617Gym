<?php
require_once("../DB/connectDB.php");

class Ejercicio{

  private $db;

  public function __construct(){
    //Esto por alguna razon no funciona
    //$this->$db = DB::getDB();
  }

  function getNameAndID(){
    $db = DB::getDB();
    $consulta = "SELECT idEjercicio, nomEjercicio FROM Ejercicio";
    $result = $db->query($consulta);
    $res = array();
    while($row = $result->fetch_assoc()){
      array_push($res, $row);
    }
    return $res;
  }

  function deleteEjercicio($id){
    $db = DB::getDB();
    $consulta = "DELETE FROM Ejercicio WHERE idEjercicio =".$id;
    $db->query($consulta);
  }

  function getById($id){
    $db = DB::getDB();
    $consulta = "SELECT * FROM Ejercicio WHERE idEjercicio =".$id;
    $result = $db->query($consulta);
    return $result->fetch_assoc();
  }

  function modificarEjercicio($id,$name,$desc,$cat){
    $db = DB::getDB();
    $consulta = "UPDATE Ejercicio SET nomEjercicio='".$name."',
                                      descripcion='".$desc."',
                                      categoria='".$cat.
                "' WHERE idEjercicio= '".$id."'";
    $db->query($consulta);
  }

  function createEjercicio($nombre, $desc, $categoria){
	  $db = DB::getDB();
	  $consulta = "INSERT INTO Ejercicio (nomEjercicio, descripcion, categoria)
					VALUES ('".$nombre."', '".$desc."', '".$categoria."')";

	  $db->query($consulta);
  }


}
?>
