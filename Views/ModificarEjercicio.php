<!--Martín 2/11/16-->
<!DOCTYPE html>
<html>
  <head>
    <title>Modificar Ejercicio</title>
    <?php
    require_once('NavBar.php');
    require_once('../Controllers/c_Ejercicio.php');
    require_once("../DB/connectDB.php");

    $ejerciciosController = new EjercicioController();
    $ejercicio = $ejerciciosController->getEjercicio($_GET['id']);
    $id = $_GET['id'];
    ?>
  </head>

  <body>
    <div class="tabla">
      <form method="post" action="../Controllers/c_Ejercicio.php?op=1" id="modificar" onsubmit="return validarEjercicio()">
        <div class="row"><span class="col-md-2">Nombre:</span> <input id='nombre' type="text" name="nomEjercicio" value="<?php echo($ejercicio['nomEjercicio']);?>" /></div>
        <div class="row"><span class="col-md-2">Descripción:</span>  <input type="text" name="desEjercicio" value= "<?php echo($ejercicio['descripcion']);?>"/></div>
        <!-- TODO: Almacenar las opciones del combobox en un archivo a parte-->
        <div class="row"><span class="col-md-2">Categoria:</span>  <select id='categoria' name="catEjercicio">
                      <option value="">--Selecionar--</option>
                      <option value="Brazo">Brazo</option>
                      <option value="Pierna">Pierna</option>
                      <option value="Espalda">Espalda</option>
                    </select></div>
      </form>

      <button type="submit" class="btn btn-success" form="modificar" name="idEjercicio" value = <?php echo("".$id."");?>>Modificar</button>
    </div>
  </body>
</html>
