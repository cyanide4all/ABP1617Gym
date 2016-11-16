<!--Elias 16/11/16-->
<!DOCTYPE html>
<html>
  <head>
    <title>Reservar Sesion</title>
    <?php
        require_once('NavBar.php');
        require_once('../Controllers/c_Actividad.php');
        require_once("../DB/connectDB.php");
        $ActividadesController = new ActividadController();
        $Sesiones = $ActividadesController->getSesiones($_GET['id']);
    ?>

  </head>

    <body>
      <div id = 'tabla2elementos' >
        <div class = 'tupla'>
          <a clas = 'izquierda'>Fecha Sesion</a> <a clas = 'derecha'>Opciones</a>
        </div>
          <?php foreach($Sesiones as $it){ ?>
          <form method="post" action="../Controllers/c_Actividad.php?op=4" id="deleleFromActividad<?php echo($it['idSesion']);?>">
            <a clas = 'izquierda'><?php echo ($it['fecha']); ?> </a>
            <input type="hidden" name="idActividad" value="<?php echo($_GET['id']);?>"><!--ESTO ES PARA POSTEAR IDTABLA PARA QUE FUNCIONE EL CONTROLLER-->
            </form>
        <button type="submit" form="deleleFromActividad<?php echo($it['idSesion']);?>" name="idSesion" value = <?php echo("".$it['idSesion']."");?>>Borrar</button>
        </div>

        <?php } ?>

      </div>
    </body>
</html>
