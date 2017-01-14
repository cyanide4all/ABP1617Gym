<!--Martín 14/12/16-->
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
    <div class = 'tabla panel-default' >
      <div class = 'row panel-heading'>
        <span class ="col-md-2">Nombre de Tabla</span> <span class ="col-md-2">Opciones</span>
      </div>
      <?php foreach($tabla as $it){ ?>
        <div class = 'row'>
          <span  class="col-md-2"><?php echo ($it['nomTabla']); ?> </span>
      <button class='btn btn-success' onclick="location.href='SeguirTabla.php?id=<?php echo($it['idTabla']);?>'">Seguir Tabla</button>
      </div>
      <?php } ?>
      </div>
  </body>
</html>
