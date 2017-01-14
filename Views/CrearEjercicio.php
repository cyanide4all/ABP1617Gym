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
    <div class="tabla">
      <form method="post" action="../Controllers/c_Ejercicio.php?op=2" onsubmit="return validarEjercicio()">
        <div class="row"><span class="col-md-2">Nombre:</span><input id='nombre' type="text" name="nomEjercicio" placeholder="Nombre" /></div>
        <div class="row"><span class="col-md-2">Descripción:</span><input type="text" name="desEjercicio" placeholder="Descripcion" /></div>
        <!-- TODO: Almacenar las opciones del combobox en un archivo a parte-->
        <div class="row">
          <span class="col-md-2">
          Categoria:</span>  <select id='categoria' name="catEjercicio">
                      <option value="">--Selecionar--</option>
                      <option value="Brazo">Brazo</option>
                      <option value="Pierna">Pierna</option>
                      <option value="Espalda">Espalda</option>
                    </select></br>
                  </div>

        <input type="submit" name="idEjercicio" class="btn btn-success">
      </form>
    </div>
  </div>
  </body>
</html>
