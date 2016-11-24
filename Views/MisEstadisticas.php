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

    $estadisticasController = new EstadisticasController();
    $estadisticas = $estadisticasController->getEstadisticas();

    $ejerciciosController = new EjercicioController();
    //$ejercicio = $ejerciciosController->getEjercicio();
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
        <a clas = 'izquierda'>
          <?php
            $ejercicio = $ejerciciosController->getEjercicio($it['TablaEjercicio_Ejercicio_idEjercicio']);
            //echo ( "---> ".$ejercicio['nomEjercicio']);
            echo ("Ejercicio: ".$ejercicio['nomEjercicio']."   - - - -  "."Fecha: ".$it['fecha']);?></a>
          <?php
        }?>
        <hr>
        <a clas = 'izquierda'>Ejercicios realizados ultimas 10 horas</a>
        <br>
        <?php foreach($estadisticas as $it){ ?>
        <div class = 'tupla'>
          <a clas = 'izquierda'>
            <?php

            date_default_timezone_set('Europe/Madrid');
            $date = $it['fecha'];
            strtotime($date);
            time() - strtotime($date);
            //3 digito  son las horas que pasaron.
            if((time()-(60*60*10)) < strtotime($date)){

              $ejercicio = $ejerciciosController->getEjercicio($it['TablaEjercicio_Ejercicio_idEjercicio']);
              //echo ( "---> ".$ejercicio['nomEjercicio']);
              echo ("Ejercicio: ".$ejercicio['nomEjercicio']."   - - - -  "."Fecha: ".$it['fecha']);?></a>
        <?php
            }
          }
        ?>
        <hr>
        <a clas = 'izquierda'>Ejercicios realizados ultimos 7 dias</a>
        <br>
        <div class = 'tupla'>
          <a clas = 'izquierda'>
            <?php
            $total = $estadisticasController->getSemana();
              echo ("Esta semana has realizado un total de: ".$total['cont']." ejercicios.");
            ?>
          </a>
        </div>

      </br></br>
      </div>
    </div>
  </body>
</html>
