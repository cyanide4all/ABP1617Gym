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
    <div>
      <form method="post" action="../Controllers/c_Ejercicio.php?op=1" id="modificar">
        Nombre: <input type="text" name="nomEjercicio" value="<?php echo($ejercicio['nomEjercicio']);?>" /></br>
        Descripción:  <input type="text" name="desEjercicio" value= "<?php echo($ejercicio['descripcion']);?>"/></br>
        <!-- TODO: Almacenar las opciones del combobox en un archivo a parte-->
        Categoria:  <select name="catEjercicio">
                      <option value="">--Selecionar--</option>
                      <option value="Brazo">Brazo</option>
                      <option value="Pierna">Pierna</option>
                      <option value="Espalda">Espalda</option>
                    </select></br>
      </form>

      <button type="submit" form="modificar" name="idEjercicio" value = <?php echo("".$id."");?>>Modificar</button>
    </div>
  </body>
</html>
