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
    <div>
      <form method="post" action="../Controllers/c_Actividad.php?op=2">
        Nombre: <input type="text" name="nomActividad" placeholder="Nombre" /></br>
        Numero de plazas:  <input type="text" name="numPlazas" placeholder="numero de plazas" /></br>
        <!-- TODO: Almacenar las opciones del combobox en un archivo a parte-->
        Categoria:  <select name="tipoActividad">
                      <option value="">--Selecionar--</option>
                      <option value="Individual">Individual</option>
                      <option value="Grupal">Grupo</option>
                    </select></br>
        <input type="submit" name="idActividad">
      </form>
    </div>
  </body>
</html>
