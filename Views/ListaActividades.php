<!--Elias 16/11/2016-->
<!DOCTYPE html>
<html>
  <head>
    <title>Lista de Actividad</title>
    <?php
    require_once('NavBar.php');
    require_once('../Controllers/c_Actividad.php');
    require_once('../Controllers/c_Reservas.php');
    require_once("../DB/connectDB.php");

    $actividadesController = new ActividadController();
    $reservasController = new ReservaController();
    $actividades = $actividadesController->gestionActividades(); //TODO gestionSesiones
    ?>
  </head>

  <body>
    <div id = 'tabla2elementos' >
      <div class = 'tupla'>
        <a clas = 'izquierda'>Nombre de Actividad</a> <a clas = 'derecha'>Opciones</a>
      </div>
      <?php foreach($actividades as $it){ ?>
      <div class = 'tupla'>
        <a clas = 'izquierda'><?php echo ($it['nomActividad']); ?> </a>
          <?php
          $sesiones = $actividadesController->getSesiones($it['idActividad']);
          foreach($sesiones as $it2){
          ?>
          <form method= "post" action = "../Controllers/c_Reservas.php?op=1" class ='derecha' id="reservar<?php echo($it2['idSesion']);?>">
            <a>Sesion: <?php echo($it2['fecha']) ?></a>
            <input type="hidden" name="idSesion" value="<?php echo($it2['idSesion']);?>"/>
          </form>
          <?php
          if(!$reservasController->yaReservado($it2['idSesion'])&&$actividadesController->quedanPlazas($it2['idSesion'])){ //si ya se reservo plaza o no quedan no se muestra la opcion de reservar
          ?>
            <button type="submit" form="reservar<?php echo($it2['idSesion']);?>" name="idActividad" value="<?php echo($it['idActividad']);?>">Reservar</button>
          <?php
          }
          if(!$actividadesController->quedanPlazas($it2['idSesion'])&&$actividadesController->esGrupal($it['idActividad'])){
          ?>
            <a>NO QUEDAN PLAZAS</a>
          <?php
          }
        }
        ?>
      </div>
      <?php } ?>
    </div>
  </body>
</html>
