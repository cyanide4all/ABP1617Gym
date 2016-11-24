<!--Martin 15/11/16-->
<!DOCTYPE html>
<html>
  <head>
    <title>Modificar la Tabla</title>
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
    <div id = 'tabla3elementos' >
      <div class = 'tupla'>
        <a clas = 'izquierda'>Actividad</a> <a>Sesion</a> <a clas = 'derecha'>Opciones</a>
      </div>
      <?php
      foreach($misReservas as $it){
        $sesion = $actividadesController->getSesion($it['Sesion_idSesion']);
        $actividad = $actividadesController->getActividad($sesion['Actividad_idActividad']);
      ?>
        <a><?php echo($actividad['nomActividad']); ?></a>   <a><?php echo($sesion['fecha']);?> </a>
        <form method="post" action="../Controllers/c_Reservas.php?op=0" id = "borrar<?php echo($sesion['idSesion']); ?>">
        </form>
        <button type="submit" form="borrar<?php echo($sesion['idSesion']);?>" name="idSesion" value="<?php echo($sesion['idSesion']);?>">Borrar Reserva</button>
      </br>
    <?php } ?>
  </body>
</html>
