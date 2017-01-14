<!-- Raul 17/11/2016 -->
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
    <title>Mis Estadísticas</title>
    <?php
    require_once('NavBar.php');
    require_once('../Controllers/c_Estadisticas.php');
    require_once('../Controllers/c_Ejercicio.php');
    require_once("../DB/connectDB.php");
    require_once('../Controllers/c_Reservas.php');


    $userController = new UsuarioController();
    $user = $userController->getUserByEmail($_SESSION['userID']);

    $estadisticasController = new EstadisticasController();
    $estadisticas = $estadisticasController->getEstadisticas();

    $ejerciciosController = new EjercicioController();

    $reservasController = new ReservaController();
    $misReservas = $reservasController->getMisReservas();

    ?>

  </head>

  <body>
    <div class="tabla panel-default" >
      <div class = 'row panel-heading'>
        <span class= "col-md-2" >Ejercicios realizados</span> <span clas = 'derecha'>fecha</span>
      </div>

      <br>

      <?php foreach($estadisticas as $it){ ?>
      <div class = 'row'>
        <?php $ejercicio = $ejerciciosController->getEjercicio($it['TablaEjercicio_Ejercicio_idEjercicio']);?>
        <span  class="col-md-2"><?php echo ($ejercicio['nomEjercicio']);?></span>
        <span  class="col-md-2"><?php echo ($it['fecha']);?></span>
      </div>
      <?php } ?>

      <hr>

        <div class = 'row panel-heading'>
          <span class= "col-md-2" >Ejercicios realizados ultimas 10 horas</span>
      </div>
      <br>
      <?php foreach($estadisticas as $it){ ?>
      <div class = 'row'>
        <?php if($estadisticasController->checkFecha10horas($it['fecha'])){
          $ejercicio = $ejerciciosController->getEjercicio($it['TablaEjercicio_Ejercicio_idEjercicio']);
          ?>
          <span  class="col-md-2"><?php echo ($ejercicio['nomEjercicio']);?></span>
          <span  class="col-md-2"><?php echo ($it['fecha']);?></span>
        <?php }?>
      </div>

      <?php } ?>

      <hr>
      <div class = 'row panel-heading'>
        <span class= "col-md-4" >Ejercicios realizados ultimos 7 dias</span>
      </div>
      <br>

      <div class = 'row panel-heading'>
          <?php $total = $estadisticasController->getSemana();?>
            <span class= "col-md-4" >Esta semana has realizado un total de:<br><br> <?php echo($total['cont']); ?> ejercicios </span>
      </div>

      <hr>

      <div class = 'row panel-heading'>
        <span class= "col-md-2" >Participacion en sesiones</span>
      </div>

      <br>

      <div class = 'row panel-heading'>
        <span class= "col-md-4" >Te has anotado a un total de:<br><br> <?php echo ($reservasController->contarReservas());?> sesiones de grupo</span>
      </div>

      <hr>

      <div class = 'row panel-heading'>
        <span class= "col-md-2" >Resumen</span>
      </div>

      <br>

      <div class = 'row panel-heading'>
        <span class= "col-md-4" >Desde que empezaste con nosotros llevas un total de:<br><br> <?php echo ($estadisticasController->contarEjercicios()); ?> Ejercicios realizados</span>
      </div>

      </br>
    </div>
  </body>
</html>
<?php
}
?>
