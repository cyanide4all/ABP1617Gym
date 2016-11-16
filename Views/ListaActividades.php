<!--Elias 16/11/2016-->
<!DOCTYPE html>
<html>
  <head>
    <title>Lista de Actividad</title>
    <?php
    require_once('NavBar.php');
    require_once('../Controllers/c_Actividad.php');
    require_once("../DB/connectDB.php");

    $ActividadesController = new ActividadController();
    $Actividades = $ActividadesController->gestionActividades(); //TODO gestionSesiones
    ?>
  </head>

    <body>
            <div id = 'tabla2elementos' >
                  <div class = 'tupla'>
                    <a clas = 'izquierda'>Nombre de Actividad</a> <a clas = 'derecha'>Opciones</a>
                  </div>
                  <?php foreach($Actividades as $it){ ?>
                  <div class = 'tupla'>
                    <a clas = 'izquierda'><?php echo ($it['nomActividad']); ?> </a>
                      <form method= "post" action = "../Controllers/c_Reservas.php?op=1" class ='derecha' id="reservar<?php echo($it['idActividad']);?>">
                      </form>
                    	<button type="submit" form="reservar<?php echo($it['idActividad']);?>" name="idActividad" value="<?php echo($it['idActividad']);?>">Reservar</button>
                  </div>
                  <?php } ?>
          </div>
    </body>
</html>
