<!--Martín 2/11/16-->
<!DOCTYPE html>
<html>
  <head>
    <title>Modificar Tabla</title>
    <?php
    require_once('NavBar.php');
    require_once('../Controllers/c_Tabla.php');
    require_once("../DB/connectDB.php");

    $tablasController = new TablaController();
    $tabla = $tablasController->getTabla($_GET['id']);
    $id = $_GET['id'];
    ?>
  </head>

  <body>
    <div class="tabla">
      <form method="post" action="../Controllers/c_Tabla.php?op=1" id="modificar" onsubmit="return validarTabla">
        <div class="row"><span class="col-md-2">Nombre:</span> <input id='nombre' type="text" name="nomTabla" value="<?php echo($tabla['nomTabla']);?>" /></div>
        <div class="row"><span class="col-md-2">Descripción:</span><input type="text" name="desTabla" value= "<?php echo($tabla['descripcion']);?>"/></div>
      </form>

      <button class="btn btn-success" type="submit" form="modificar" name="idTabla" value = <?php echo("".$id."");?>>Modificar</button>
    </div>
  </body>
</html>
