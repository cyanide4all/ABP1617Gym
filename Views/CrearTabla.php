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
    <div>
      <form method="post" action="../Controllers/c_Tabla.php?op=2" id = "crear">
        Nombre: <input type="text" name="nomTabla" placeholder="Nombre" /></br>
        Descripción:  <input type="text" name="desTabla" placeholder="Descripcion" /></br>
      </form>
      <button type="submit" form="crear" name="idTabla" value = <?php echo("".($maxID['idTabla']+1)."");?>>Crear y modificar ejercicios</button>
    </div>
  </body>
</html>
