<!--Elias 16/11/16-->
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
    <title>Gestionar Sesiones</title>
    <?php
        require_once('NavBar.php');
        require_once('../Controllers/c_Actividad.php');
        require_once("../DB/connectDB.php");
        $ActividadesController = new ActividadController();
        $Sesiones = $ActividadesController->getSesiones($_GET['id']);
    ?>
  </head>

    <body>
      <div class="tabla panel-default">
        <div class = 'row panel-heading'>
      <span  class ="col-md-2">Fecha de la sesion</span><span class = 'col-md-2'>Opciones</span>
        </div>
          <?php foreach($Sesiones as $it){ ?>
        <div class="row">
          <form method="post" action="../Controllers/c_Actividad.php?op=4" id="deleleFromActividad<?php echo($it['idSesion']);?>">
            <span class = 'col-md-2'><?php echo ($it['fecha']); ?> </span>
            <input type="hidden" name="idActividad" value="<?php echo($_GET['id']);?>"><!--ESTO ES PARA POSTEAR IDACTIVIDAD PARA QUE FUNCIONE EL CONTROLLER-->
          </form>
        <button class="col-md-1 btn btn-danger" form="deleleFromActividad<?php echo($it['idSesion']);?>" name="idSesion" value = <?php echo("".$it['idSesion']."");?>>Borrar</button>
        </div>

        <?php } ?>
      </br>
        <form method="post" action="../Controllers/c_Actividad.php?op=3" onsubmit="return validarFechaHora()">
          <input type="hidden" name="idActividad" value="<?php echo($_GET['id']);?>"/>
          Fecha y hora de la nueva sesion: <input id='fechaHora' type="datetime" placeholder="AAAA-MM-DD HH:MM" name="fecha"/>
          <input class="btn btn-success" type="submit" value="Crear"/>
        </form>
        <button class="btn btn-info" onclick="location.href='GestionActividades.php'">Hecho</button>
      </div>
    </body>
</html>
<?php
}
}
?>
