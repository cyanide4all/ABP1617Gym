<!--Martin 15/11/16-->
<?php
//ESTAR LOGEADO AL MENOS
if(!isset($_SESSION))
{
    session_start();
}
if(!isset($_SESSION['userID'])){
  header('Location: paginaPrincipal.php');
}else{
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Mis Reservas</title>
    <?php
        require_once('NavBar.php');
        require_once('../Controllers/c_Reservas.php');
        require_once('../Controllers/c_Actividad.php');
        $actividadesController = new ActividadController();
        $reservasController = new ReservaController();
        $misReservas = $reservasController->getMisReservas();
      ?>

  </head>

  <body>
    <div class="tabla panel-default" >
      <div class = 'row panel-heading'>
        <span class= "col-md-2" >Actividad</span> <span class= "col-md-2">Sesion</span> <span class= "col-md-2">Opciones</span>
      </div>
      <?php
      foreach($misReservas as $it){
        $sesion = $actividadesController->getSesion($it['Sesion_idSesion']);
        $actividad = $actividadesController->getActividad($sesion['Actividad_idActividad']);
      ?>
      <div class="row">
        <span class= "col-md-2"><?php echo($actividad['nomActividad']); ?></span>   <span class= "col-md-2"><?php echo($sesion['fecha']);?> </span>
        <form method="post" action="../Controllers/c_Reservas.php?op=0" id = "borrar<?php echo($sesion['idSesion']); ?>">
        </form>
        <span class= "col-md-2"><button class="btn btn-success" type="submit" form="borrar<?php echo($sesion['idSesion']);?>" name="idSesion" value="<?php echo($sesion['idSesion']);?>">Borrar Reserva</button></span>
      </br>
    </div>
    <?php } ?>
  </body>
</html>
<?php
}
?>
