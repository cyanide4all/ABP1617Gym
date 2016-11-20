<!--Raul 14/11/2016-->
<!DOCTYPE html>
<html>
  <head>
    <title>Gestion de Actividad</title>
    <?php
    require_once('NavBar.php');
    require_once('../Controllers/c_Actividad.php');
    require_once("../DB/connectDB.php");

    $ActividadesController = new ActividadController();
    $Actividades = $ActividadesController->gestionActividadesConTipo();
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
        <form method= "post" action = "../Controllers/c_Actividad.php?op=0" class ='derecha' id="borrar">
        </form>
    	<button type="submit" form="borrar" name="idActividad" value = <?php echo("".$it['idActividad']."");?>>Borrar</button>
    	<button onclick="location.href='ModificarActividad.php?id=<?php echo($it['idActividad']);?>'">Modificar</button>
      <?php if($it['tipoAct']=="Grupal"){?>
      <button onclick="location.href='SesionActividad.php?id=<?php echo($it['idActividad']);?>'">Gestionar Sesiones</button>
      <?php } ?>
    </div>
    <?php } ?>
      <button onclick="location.href='CrearActividad.php'">Crear Nueva Actividad</button>
    </div>
  </body>
</html>
