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
    <div id = 'tabla2elementos' >
      <div class = 'tupla'>
        <a clas = 'izquierda'>Nombre de Tabla</a> <a clas = 'derecha'>Opciones</a>
      </div>
      <?php foreach($tabla as $it){ ?>
      <div class = 'tupla'>
        <a clas = 'izquierda'><?php echo ($it['nomTabla']); ?> </a>
      <button onclick="location.href='SeguirTabla.php?id=<?php echo($it['idTabla']);?>'">Seguir Tabla</button>
      </div>
      <?php } ?>
      </div>
  </body>
</html>
