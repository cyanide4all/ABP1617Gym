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
    <title>Modificar Actividad</title>
    <?php
    require_once('NavBar.php');
    require_once('../Controllers/c_Actividad.php');
    require_once("../DB/connectDB.php");

    $actividadesController = new ActividadController();
    $actividad = $actividadesController->getActividad($_GET['id']);
    $id = $_GET['id'];
    ?>
  </head>

  <body>
    <div class="tabla">
      <form method="post" action="../Controllers/c_Actividad.php?op=1" id="modificar" onsubmit="return validarActividad()">
        <div class="row"><span class="col-md-2">Nombre: </span><input id='nombre' class="col-md-2" type="text" name="nomActividad" value="<?php echo($actividad['nomActividad']);?>" /></div>
        <!-- TODO: Almacenar las opciones del combobox en un archivo a parte-->
        <div class="row"><span class="col-md-2">Tipo: </span><select id='categoria' name="tipoActividad">
                      <option value="">--Selecionar--</option>
                      <option value="Individual">Individual</option>
                      <option value="Grupal">Grupo</option>
                    </select></div>
		    <div class="row"><span class="col-md-2">Plazas: </span><input id='nPlazas' type="text" name="plazasActividad" value= "<?php echo($actividad['numPlazas']);?>"/></div>
      </form>
      <button class="btn btn-success" type="submit" form="modificar" name="idActividad" value = <?php echo("".$id."");?>>Modificar</button>
    </div>
  </body>
</html>
<?php
}
}
?>
