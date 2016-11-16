<!--Martin 15/11/16-->
<!DOCTYPE html>
<html>
  <head>
    <title>Modificar la Tabla</title>
    <?php
        require_once('NavBar.php');
        require_once('../Controllers/c_Tabla.php');
        require_once('../Controllers/c_Ejercicio.php');
        require_once("../DB/connectDB.php");
        $ejerciciosController = new EjercicioController();
        $tablaController = new TablaController();
        $ejercicios = $ejerciciosController->gestionEjercicios();
        $ejerciciosTabla = $tablaController->getEjerciciosTabla($_GET['id']);
    ?>

  </head>

    <body>
    <div id=tabla3elementos>
      <a>Nombre del ejercicio</a>  <a>Repeticiones</a>  <a>Carga</a>
      <?php foreach($ejerciciosTabla as $it){ ?>
      <form method="post" action="../Controllers/c_Tabla.php?op=4" id="deleleFromTabla<?php echo($it['Ejercicio_idEjercicio']);?>">
        <?php  $toShow = $ejerciciosController->getEjercicio($it['Ejercicio_idEjercicio']);      ?>
        <a><?php echo($toShow['nomEjercicio']);?></a> ---
        <a><?php echo($it['nRepeticiones']);?></a> ---
        <a><?php echo($it['carga']);?></a>
        <input type="hidden" name="idTabla" value="<?php echo($_GET['id']);?>"><!--ESTO ES PARA POSTEAR IDTABLA PARA QUE FUNCIONE EL CONTROLLER-->
      </form>
      <button form="deleleFromTabla<?php echo($it['Ejercicio_idEjercicio']);?>" name="idEjercicio" value = <?php echo("".$it['Ejercicio_idEjercicio']."");?>>Borrar</button>
      <?php }?>
    </div>
    </br>
    <a>Añadir un nuevo ejercicio</a>
    <form method="post" action="../Controllers/c_Tabla.php?op=3" id="addEjercicioTabla">
      <select name='idEjercicio'>
          <option value="">--Selecionar--</option>
        <?php foreach($ejercicios as $it){ ?>
          <option value="<?php echo($it['idEjercicio']);?>"><?php echo($it['nomEjercicio']);?></option>
        <?php }?>
      </select>
      <input type="text" name="numRepeticiones" placeholder="Numero de repeticiones"/>
      <input type="text" name="carga" placeholder="carga"/>
    </form>
    <button form="addEjercicioTabla" name="idTabla" value = <?php echo("".$_GET['id']."");?>>Añadir</button>
    </body>
</html>
