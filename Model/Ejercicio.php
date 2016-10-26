<?php
require_once("../DB/connectDB.php");

class Ejercicio{
  private $db = null;
  function __construct(){
    $db = DB::getDB();
  }

  function getNameAndID(){
    $db = new mysqli('localhost', 'abp', 'abp', 'mydb');
    $consulta = "SELECT idEjercicio, nomEjercicio FROM Ejercicio";
    $result = $db->query($consulta);
    $res = array();
    while($row = $result->fetch_assoc()){
      array_push($res, $r);
    }
    return $res;
  }
}
?>
