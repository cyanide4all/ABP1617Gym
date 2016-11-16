<!--Martín 15/11/16-->
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
        <form method= "post" action = "../Controllers/c_Tabla.php?op=0" class ='derecha' id="borrar">
        </form>
    	<button type="submit" form="borrar" name="idTabla" value = <?php echo("".$it['idTabla']."");?>>Borrar</button>
    	<button onclick="location.href='ModificarTabla.php?id=<?php echo($it['idTabla']);?>'">Modificar</button>
      <button onclick="location.href='ModEjerciciosTabla.php?id=<?php echo($it['idTabla']);?>'">Cambiar Ejercicios</button>
      <button onclick="location.href='SeguirTabla.php?id=<?php echo($it['idTabla']);?>'">Seguir Tabla</button>
      </div>

      <?php } ?>
      <button onclick="location.href='CrearTabla.php'">Crear Nuevo Tabla</button>
    </div>
  </body>
</html>
