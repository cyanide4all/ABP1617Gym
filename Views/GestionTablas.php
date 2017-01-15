<!--Martín 15/11/16-->
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
    <title>Gestion de tabla</title>
    <?php
    require_once('NavBar.php');
    require_once('../Controllers/c_Tabla.php');
    require_once("../DB/connectDB.php");

    $tablaController = new TablaController();
    $tabla = $tablaController->gestionTablas();
    ?>
  </head>

  <body>
    <div class="tabla panel-default" >
      <div class = 'row panel-heading'>
        <span class ="col-md-2">Nombre de Tabla</span> <span class ="col-md-2">Opciones</span>
      </div>
      <?php foreach($tabla as $it){ ?>
      <div class = 'row'>
        <span  class="col-md-2"><?php echo ($it['nomTabla']); ?> </span>
        <form method= "post" action = "../Controllers/c_Tabla.php?op=0" class ='derecha' id="borrar">
        </form>
    	<button  class="col-md-1 btn btn-danger" form="borrar" name="idTabla" value = <?php echo("".$it['idTabla']."");?>>Borrar</button>
    	<button class="col-md-1 btn btn-warning"onclick="location.href='ModificarTabla.php?id=<?php echo($it['idTabla']);?>'">Modificar</button>
      <button class="col-md-2 btn btn-info" onclick="location.href='ModEjerciciosTabla.php?id=<?php echo($it['idTabla']);?>'">Cambiar Ejercicios</button>
      </div>

      <?php } ?>
      <button class="btn btn-success" onclick="location.href='CrearTabla.php'">Crear Nueva Tabla</button>
    </div>
  </body>
</html>
<?php
  }
}
?>
