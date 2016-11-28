<!-- Raul 17/11/2016 -->
<!DOCTYPE html>
<html>
  <head>
    <title>Lista de Actividad</title>
    <?php
    require_once('NavBar.php');
    require_once('../Controllers/c_Estadisticas.php');
    require_once('../Controllers/c_Ejercicio.php');
    require_once("../DB/connectDB.php");
    require_once('../Controllers/c_Reservas.php');

    $estadisticasController = new EstadisticasController();
    $estadisticas = $estadisticasController->getEstadisticas();

    $ejerciciosController = new EjercicioController();

    $reservasController = new ReservaController();
    $misReservas = $reservasController->getMisReservas();

    ?>

  </head>

  <body>
    <div id = 'tabla2elementos' >
      <div class = 'tupla'>
        <a clas = 'izquierda'>Ejercicios realizados</a> <a clas = 'derecha'>fecha</a>
      </div>

      <br>

      <?php foreach($estadisticas as $it){ ?>
      <div class = 'tupla'>
        <?php $ejercicio = $ejerciciosController->getEjercicio($it['TablaEjercicio_Ejercicio_idEjercicio']);?>
        <a class = 'izquierda'><?php echo ($ejercicio['nomEjercicio']);?></a>
        <a class = 'derecha'><?php echo ($it['fecha']);?></a>
      </div>
      <?php } ?>

      <hr>

      <div class = 'tupla'>
        <a clas = 'izquierda'>Ejercicios realizados ultimas 10 horas</a>
      </div>
      <br>
      <?php foreach($estadisticas as $it){ ?>
      <div class = 'tupla'>
        <?php if($estadisticasController->checkFecha10horas($it['fecha'])){
          $ejercicio = $ejerciciosController->getEjercicio($it['TablaEjercicio_Ejercicio_idEjercicio']);
          ?>
          <a class = 'izquierda'><?php echo ($ejercicio['nomEjercicio']);?></a>
          <a class = 'derecha'><?php echo ($it['fecha']);?></a>
        <?php }?>
      </div>

      <?php } ?>

      <hr>
      <div class = 'tupla'>
        <a clas = 'izquierda'>Ejercicios realizados ultimos 7 dias</a>
      </div>
      <br>

      <div class = 'tupla'>
        <a clas = 'izquierda'>
          <?php $total = $estadisticasController->getSemana();?>
          Esta semana has realizado un total de: <?php echo($total['cont']); ?> ejercicios
        </a>
      </div>

      <hr>

      <div class = 'tupla'>
        <a clas = 'izquierda'>Participacion en sesiones</a>
      </div>

      <br>

      <div class = 'tupla'>
        <a clas = 'izquierda'>
          Te has anotado a un total de: <?php echo ($reservasController->contarReservas());?> sesiones de grupo
        </a>
      </div>

      <hr>

      <div class = 'tupla'>
      <a clas = 'izquierda'>Participacion en sesiones</a>
      </div>

      <br>

      <div class = 'tupla'>
        <a clas = 'izquierda'>
          Desde que empezaste con nosotros llevas realizados un total de: <?php echo ($estadisticasController->contarEjercicios()); ?> Ejercicios realizados
        </a>
      </div>

      </br>
    </div>
  </body>
</html>
