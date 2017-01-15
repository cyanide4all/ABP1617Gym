<!--Martín 2/11/16-->
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
    <title>Modificar Tabla</title>
    <?php
    require_once('NavBar.php');
    require_once('../Controllers/c_Tabla.php');
    require_once("../DB/connectDB.php");

    $tablasController = new TablaController();
    $tabla = $tablasController->getTabla($_GET['id']);
    $id = $_GET['id'];
    ?>
  </head>

  <body>
    <div class="tabla">
      <form method="post" action="../Controllers/c_Tabla.php?op=1" id="modificar" onsubmit="return validarTabla">
        <div class="row"><span class="col-md-2">Nombre:</span> <input id='nombre' type="text" name="nomTabla" value="<?php echo($tabla['nomTabla']);?>" /></div>
        <div class="row"><span class="col-md-2">Descripción:</span><input type="text" name="desTabla" value= "<?php echo($tabla['descripcion']);?>"/></div>
      </form>

      <button class="btn btn-success" type="submit" form="modificar" name="idTabla" value = <?php echo("".$id."");?>>Modificar</button>
    </div>
  </body>
</html>
<?php
}
}
?>
