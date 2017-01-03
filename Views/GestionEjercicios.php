<!--Martín 26/10/16-->
<!DOCTYPE html>
<html>
  <head>
    <title>Gestion de Ejercicio</title>
    <?php
    require_once('NavBar.php');
    require_once('../Controllers/c_Ejercicio.php');
    require_once("../DB/connectDB.php");

    $ejerciciosController = new EjercicioController();
    $ejercicios = $ejerciciosController->gestionEjercicios();
    ?>
  </head>

  <body>

    <div class="tabla">

      <div class = 'row'>
        <a class ="col-md-2">Nombre de ejercicio</a> <a class="col-md-2" >Opciones</a>
      </div>
      <?php foreach($ejercicios as $it){ ?>
        <div class="row">
        <a class="col-md-2"><?php echo ($it['nomEjercicio']); ?> </a>
        <button type="submit" form="borrar" class="btn btn-danger col-md-1" name="idEjercicio" value = <?php echo("".$it['idEjercicio']."");?>>Borrar</button>
        <button onclick="location.href='ModificarEjercicio.php?id=<?php echo($it['idEjercicio']);?>'" class="btn btn-warning col-md-1">Modificar</button>
      </div>
        <form method= "post" action = "../Controllers/c_Ejercicio.php?op=0" class ='derecha' id="borrar">
        </form>
      <br>

      <?php } ?>

      <button onclick="location.href='CrearEjercicio.php'">Crear Nuevo Ejercicio</button>
    </div>

  </body>
</html>
