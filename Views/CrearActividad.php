<!--Raul 14/11/2016-->
<!DOCTYPE html>
<html>
  <head>
    <title>Crear Actividad</title>
    <?php
      require_once('NavBar.php');
      require_once('../Controllers/c_Actividad.php');
      require_once("../DB/connectDB.php");

      $ActividadesController = new ActividadController();

      ?>
  </head>

  <body>
    <div class="tabla">
      <form method="post" action="../Controllers/c_Actividad.php?op=2">
        <div class="row"><span class="col-md-2">Nombre:</span> <input class="col-md-2" type="text" name="nomActividad" placeholder="Nombre" /></div>
        <div class="row"><span class="col-md-2">Numero de plazas: </span><input class="col-md-2" type="text" name="numPlazas" placeholder="numero de plazas" /></div>
        <!-- TODO: Almacenar las opciones del combobox en un archivo a parte-->
        <div class="row"><span class="col-md-2">Categoria: </span><select name="tipoActividad">
                      <option value="">--Selecionar--</option>
                      <option value="Individual">Individual</option>
                      <option value="Grupal">Grupo</option>
                    </select></br>
        <input class="col-md-1 btn btn-success" type="submit" value="Crear">
      </form>
    </div>
  </body>
</html>
