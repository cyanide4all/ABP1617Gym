<!--Martin 14/11/16-->
<!DOCTYPE html>
<html>
  <head>
    <title>Crear Tabla</title>
    <?php
      require_once('NavBar.php');
      require_once('../Controllers/c_Tabla.php');
      require_once("../DB/connectDB.php");

      $tablasController = new TablaController();
      $maxID = $tablasController->getMaxID();
      ?>
  </head>

  <body>
    <div class="tabla">
      <form method="post" action="../Controllers/c_Tabla.php?op=2" id = "crear">
        <div class="row"><span class="col-md-2">Nombre: </span><input class="col-md-2" type="text" name="nomTabla" placeholder="Nombre" /></div>
        <div class="row"><span class="col-md-2">Descripción: </span><input class="col-md-2" type="text" name="desTabla" placeholder="Descripcion" /></div>
      </form>
      <button class="col-md-2 btn btn-success" type="submit" form="crear" name="idTabla" value = <?php echo("".($maxID['idTabla']+1)."");?>>Crear y modificar ejercicios</button>
    </div>
  </body>
</html>
