<?php
//Martín 26/10/16
require_once('../Controllers/c_Ejercicio.php');
require_once("../DB/connectDB.php");

$ejerciciosController = new EjercicioController();
$ejercicios = $ejerciciosController->gestionEjercicios();
?>

Aqui va un NavBar

<div id = 'tabla2elementos' >
  <div class = 'tupla'>
    <a clas = 'izquierda'>Nombre de ejercicio</a> <a clas = 'derecha'>Opciones</a>
  </div>
  <?php foreach($ejercicios as $it){ ?>
  <div class = 'tupla'>
    <a clas = 'izquierda'><?php echo ($it['nomEjercicio']); ?> </a>
    <form method= "post" action = "../Controllers/c_Ejercicio.php?op=0" class ='derecha'>
      <input type="submit" name="idEjercicio" value = <?php echo("".$it['idEjercicio']."");?> >
    </form>
  </div>

  <?php } ?>
</div>
