<?php
require_once("../DB/connectDB.php");

class Ejercicio{
  private $db = null;
  function __construct(){

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
    $result = $db->query($consulta);
  }

  function getById($id){
    $db = DB::getDB();
    $consulta = "SELECT * FROM Ejercicio WHERE idEjercicio =".$id;
    $result = $db->query($consulta);
    return $result->fetch_assoc();
  }

  function modificarEjercicio($id,$name,$desc,$cat){
    $db = DB::getDB();
    $consulta = "UPDATE Ejercicio SET nomEjercicio=".$name.",
                                      descripcion=".$desc.",
                                      categoria=".$cat.
                " WHERE idEjercicio=".$id; //ESTA CONSULTA ESTÁ CHOSCA, ARREGLALO MARTIN
    $result = $db->query($consulta);
  }


}
?>
