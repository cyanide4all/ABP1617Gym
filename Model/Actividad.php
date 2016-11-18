<!--Raul 14/11/2016-->
<?php
require_once("../DB/connectDB.php");

class Actividad{

  private $db;

  public function __construct(){
    //Esto por alguna razon no funciona
    //$this->$db = DB::getDB();
  }

  function getNameAndID(){
    $db = DB::getDB();
    $consulta = "SELECT idActividad, nomActividad FROM Actividad";
    $result = $db->query($consulta);
    $res = array();
    while($row = $result->fetch_assoc()){
      array_push($res, $row);
    }
    return $res;
  }

  function deleteActividad($id){
    $db = DB::getDB();
    $consulta = "DELETE FROM Actividad WHERE idActividad =".$id;
    $db->query($consulta);
  }

  function getById($id){
    $db = DB::getDB();
    $consulta = "SELECT * FROM Actividad WHERE idActividad =".$id;
    $result = $db->query($consulta);
    return $result->fetch_assoc();
  }

  function modificarActividad($id,$name,$tip,$num){
    $db = DB::getDB();
    $consulta = "UPDATE Actividad SET nomActividad='".$name."',
                                      tipoAct='".$tip."',
                                      numPlazas='".$num.
                "' WHERE idActividad= '".$id."'";
    $db->query($consulta);
  }

  function createActividad($nombre, $tip, $num){
	  $db = DB::getDB();
	  $consulta = "INSERT INTO Actividad (nomActividad, tipoAct, numPlazas)
					VALUES ('".$nombre."', '".$tip."', '".$num."')";

	  $db->query($consulta);
  }

    function AddSesion($idActividad,$fecha){
        $db = DB::getDB();
        $consulta = "INSERT INTO Sesion (Actividad_idActividad, fecha)
    					VALUES ('".$idActividad."', '".$fecha."')";
        $db->query($consulta);
    }
    function getSesiones($idActividad){
      $db = DB::getDB();
      $consulta = "SELECT fecha, idSesion
                    FROM Sesion
                    WHERE Actividad_idActividad =".$idActividad;
      $result = $db->query($consulta);
      $res = array();
      while($row = $result->fetch_assoc()){
        array_push($res, $row);
      }
      return $res;
    }
    function delSesion($idSesion){
      $db = DB::getDB();
      $consulta = "DELETE FROM Sesion WHERE idSesion =".$idSesion;
      $db->query($consulta);
    }
    function getSesion($id){
      $db = DB::getDB();
      $consulta = "SELECT * FROM Sesion
                    WHERE idSesion =".$id;
      $result = $db->query($consulta);
      return $result->fetch_assoc();
    }
    function ocuparPlazaEnSesion($id){
      $db = DB::getDB();
      $consulta = "UPDATE Sesion SET numPlazasOcupadas=numPlazasOcupadas+1 WHERE idSesion= '".$id."'";
      $db->query($consulta);
    }
}
?>
