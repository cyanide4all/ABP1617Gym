<?php
require_once("../Model/Usuario.php");
require_once("../DB/connectDB.php");

//Metodos por defecto para los formularios
if(isset($_POST['idUsuario'])){
  if($_GET['op']==0){       //Eliminar
    UsuarioController::delUsuario($_POST['idUsuario']);
  }if($_GET['op']==1){      //Modificar
    UsuarioController::modUsuario();
  }if($_GET['op']==2){	   	//Crear
	   UsuarioController::creUsuario();
  }if($_GET['op']==3){	   	//Login
	   UsuarioController::login();
  }
}
if(isset($_GET['op']) && $_GET['op'] == 4){
  session_start();
  unset($_SESSION["userID"]);
  header('Location: ../Views/paginaPrincipal.php'); //redirect pagina anterior
}


class UsuarioController{
  function __construct(){
  }
  public function gestionUsuarios(){
    $u = new Usuario();
    $usuarios = $u->getUsuarios();
    return $usuarios;
  }

  public static function delUsuario($id){
    $u = new Usuario();
    $u->deleteUsuario($id);
    header('Location: ' . $_SERVER['HTTP_REFERER']); //redirect pagina anterior
  }

  public static function creUsuario(){
    if($_POST["passUsuario"]==$_POST["passUsuario2"]){
      $u = new Usuario();
      $u->createUsuario($_POST['nomUsuario'],$_POST['dircUsuario'],
                        $_POST["telfUsuario"],$_POST["tipoTarjetaUsuario"],
                        $_POST["dniUsuario"],$_POST["fechNacUsuario"],
                        $_POST["emailUsuario"],$_POST["passUsuario"]);
                        header('Location: ../Views/GestionUsuarios.php'); //redirect pagina anterior
              }else{
                  //TODO Esto manda un mensaje de error
                  header('Location: ' . $_SERVER['HTTP_REFERER']);
              }

  }

  public static function getUsuario($id){
    $u = new Usuario();
    return $u->getById($id);
  }

//Enchufa todas las variables POST en base de datos
  public static function modUsuario(){
    $u = new Usuario();
    if(!isset($_POST['direccion'])){
      $direc = "";
    }else{
      $direc = $_POST['direccion'];
    }

    if(!isset($_POST['tipoTarjetaUsuario'])){
      $tipoT = "";
    }else{
      $tipoT = $_POST['tipoTarjetaUsuario'];
    }

    if(!isset($_POST['telefono'])){
      $telf = "";
    }else{
      $telf = $_POST['telefono'];
    }


    $u->modificarUsuario($_POST['idUsuario'],$_POST['nomUsuario'],$direc,$telf,$tipoT);
    header('Location: ../Views/GestionUsuarios.php');
    }

    public function getUserByEmail($mail){
      $u = new Usuario();
      $result = $u->getByEmail($mail);
      return $result;
    }

    public static function login(){
      $u= new Usuario();
      $loginCorrecto = $u->tryLogin($_POST['email'],$_POST['pass']);
      if($loginCorrecto){
        session_start();
        $_SESSION['userID'] = $_POST['email'];
      }
      header('Location: ../Views/paginaPrincipal.php');
    }


}


 ?>
