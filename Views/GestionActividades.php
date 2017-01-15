<!--Raul 14/11/2016-->
<?php
//Ser admin
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

  if(!$user['tipoUsuario']=='admin'){
    header('Location: paginaPrincipal.php');
  }
  else{
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Gestion de Actividad</title>
    <?php
    require_once('NavBar.php');
    require_once('../Controllers/c_Actividad.php');
    require_once("../DB/connectDB.php");

    $ActividadesController = new ActividadController();
    $Actividades = $ActividadesController->gestionActividadesConTipo();
    ?>
  </head>

  <body>
    <div class="tabla panel-default" >
      <div class = 'row panel-heading'>
        <span class= "col-md-2" >Nombre de Actividad</span> <span class= "col-md-2">Opciones</span>
      </div>
      <?php foreach($Actividades as $it){ ?>
      <div class = 'row'>
        <span class= "col-md-2"><?php echo ($it['nomActividad']); ?> </span>
        <form method= "post" action = "../Controllers/c_Actividad.php?op=0" class ='derecha' id="borrar">
        </form>
    	<button class= "col-md-1 btn btn-danger" type="submit" form="borrar" name="idActividad" value = <?php echo("".$it['idActividad']."");?>>Borrar</button>
    	<button class= "col-md-1 btn btn-warning" onclick="location.href='ModificarActividad.php?id=<?php echo($it['idActividad']);?>'">Modificar</button>
      <?php if($it['tipoAct']=="Grupal"){?>
      <button class= "col-md-2 btn btn-info" onclick="location.href='SesionActividad.php?id=<?php echo($it['idActividad']);?>'">Gestionar Sesiones</button>
      <?php } ?>
    </div>
    <?php } ?>
      <button class="btn btn-success" onclick="location.href='CrearActividad.php'">Crear Nueva Actividad</button>
    </div>
  </body>
</html>
<?php
}
}
?>
