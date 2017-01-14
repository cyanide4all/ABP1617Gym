<!--Martín 16/11/16-->
<?php
//ESTAR LOGEADO AL MENOS
if(!isset($_SESSION))
{
    session_start();
}
if(!isset($_SESSION['userID'])){
  header('Location: paginaPrincipal.php');
}else{
?>
<!DOCTYPE html>
<html>
  <head>
    <title>¡A hacer ejercicio!</title>
    <?php
    require_once('NavBar.php');
    require_once('../Controllers/c_Tabla.php');
    require_once('../Controllers/c_Ejercicio.php');
    require_once("../DB/connectDB.php");

    $controlEjer = new EjercicioController();
    $controlTabla = new TablaController();

    $listaEjercicios = $controlTabla->getEjerciciosTabla($_GET['id']);
    ?>
  </head>

  <body>
    <div id = 'tabla2elementos' >
      <div class = 'tupla'>
        <a clas = 'izquierda'>Seguimiento de ejercicios</a>
      </div>

      <form method= "post" action = "../Controllers/c_Estadisticas.php" class ='derecha' id="seguir">

      <?php
      $i = 0;
      foreach($listaEjercicios as $it){ ?>
      <div class = 'tupla'>
        <?php
          $actual = $controlEjer->getEjercicio($it['Ejercicio_idEjercicio']);
        ?>
        <a clas = 'izquierda'><?php echo ($actual['nomEjercicio']); ?> </a>
        <a clas = 'izquierda'><?php echo ($actual['descripcion']); ?> </a>
        <a clas = 'izquierda'><?php echo ($it['nRepeticiones']); ?> </a>
        <a clas = 'izquierda'><?php echo ($it['carga']); ?> </a>

        <input type="radio" name="arrayStats[<?php echo($i); ?>]" value="1"> Realizado
        <input type="radio" name="arrayStats[<?php echo($i); ?>]" value="0"> Pendiente
        <input type="text" name="comentario[<?php echo($i); ?>]" placeholder="Escribe aqui tus comentarios"/>

        <input type="hidden" name="arrayID[<?php echo($i++); ?>]" value="<?php echo($it['Ejercicio_idEjercicio']); ?>"/>
        <input type="hidden" name ="idTabla" value="<?php echo($_GET['id']); ?>"/>


      </div>

        <?php } ?>
      <input type="submit"  value ="Enviar"/>
    </form>
    </div>
  </body>
</html>
<?php
}
?>
