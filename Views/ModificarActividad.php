<!--Raul 14/11/2016-->
<!DOCTYPE html>
<html>
  <head>
    <title>Modificar Actividad</title>
    <?php
    require_once('NavBar.php');
    require_once('../Controllers/c_Actividad.php');
    require_once("../DB/connectDB.php");

    $actividadesController = new ActividadController();
    $actividad = $actividadesController->getActividad($_GET['id']);
    $id = $_GET['id'];
    ?>
  </head>

  <body>
    <div>
      <form method="post" action="../Controllers/c_Actividad.php?op=1" id="modificar">
        Nombre: <input type="text" name="nomActividad" value="<?php echo($actividad['nomActividad']);?>" /></br>
        <!-- TODO: Almacenar las opciones del combobox en un archivo a parte-->
        TIPO:  <select name="tipoActividad">
                      <option value="">--Selecionar--</option>
                      <option value="Individual">Individual</option>
                      <option value="Grupal">Grupo</option>
                    </select></br>
		Plazas:  <input type="text" name="plazasActividad" value= "<?php echo($actividad['numPlazas']);?>"/></br>
      </form>
		

      <button type="submit" form="modificar" name="idActividad" value = <?php echo("".$id."");?>>Modificar</button>
    </div>
  </body>
</html>
