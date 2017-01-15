<!--Martin 14/11/16-->
<?php
//Ser al menos entrenador
if(!isset($_SESSION))
{
    session_start();
}
if(!isset($_SESSION['userID'])){
  header('Location: paginaPrincipal.php');
}else{
  //La sesion esta seteada. Si eres deportista no entras
  require_once('../Controllers/c_Usuario.php');
  require_once("../DB/connectDB.php");

  $usuariosController = new UsuarioController();
  $user = $usuariosController->getUserByEmail($_SESSION['userID']);

  if($user['tipoUsuario']=='deportista'){
    header('Location: paginaPrincipal.php');
  }
  else{
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Crear Tabla</title>
    <?php
      require_once('NavBar.php');
      require_once('../Controllers/c_Tabla.php');
      require_once("../DB/connectDB.php");

      $tablasController = new TablaController();
      $maxID = $tablasController->getMaxID();
      ?>
  </head>

  <body>
    <div class="tabla">
      <form method="post" action="../Controllers/c_Tabla.php?op=2" id = "crear" onsubmit="return validarTabla()">
        <div class="row"><span class="col-md-2">Nombre: </span><input id='nombre' class="col-md-2" type="text" name="nomTabla" placeholder="Nombre" /></div>
        <div class="row"><span class="col-md-2">Descripción: </span><input class="col-md-2" type="text" name="desTabla" placeholder="Descripcion" /></div>
      </form><br>
      <button class="col-md-2 btn btn-success" type="submit" form="crear" name="idTabla" value = <?php echo("".($maxID['idTabla']+1)."");?>>Crear y modificar ejercicios</button>
    </div>
  </body>
</html>

<?php
}
}
?>
