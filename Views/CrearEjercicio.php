<!--Martin 14/11/16-->
<!DOCTYPE html>
<html>
  <head>
    <title>Crear Ejercicio</title>
    <?php
      require_once('NavBar.php');
      require_once('../Controllers/c_Ejercicio.php');
      require_once("../DB/connectDB.php");

      $ejerciciosController = new EjercicioController();

      ?>
  </head>

  <body>
    <div>
      <form method="post" action="../Controllers/c_Ejercicio.php?op=2">
        Nombre: <input type="text" name="nomEjercicio" placeholder="Nombre" /></br>
        Descripción:  <input type="text" name="desEjercicio" placeholder="Descripcion" /></br>
        <!-- TODO: Almacenar las opciones del combobox en un archivo a parte-->
        Categoria:  <select name="catEjercicio">
                      <option value="">--Selecionar--</option>
                      <option value="Brazo">Brazo</option>
                      <option value="Pierna">Pierna</option>
                      <option value="Espalda">Espalda</option>
                    </select></br>
        <input type="submit" name="idEjercicio">
      </form>
    </div>
  </body>
</html>
