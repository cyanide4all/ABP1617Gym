<!--Martin 15/11/16-->
<?php
//Ser al menos entrenador
if(!isset($_SESSION))
{
    session_start();
}
if(!isset($_SESSION['userID'])){
  header('Location: paginaPrincipal.php');
}else{
  //La sesion esta seteada. Si eres deportista no entras
  require_once('../Controllers/c_Usuario.php');
  require_once("../DB/connectDB.php");

  $usuariosController = new UsuarioController();
  $user = $usuariosController->getUserByEmail($_SESSION['userID']);

  if($user['tipoUsuario']=='deportista'){
    header('Location: paginaPrincipal.php');
  }
  else{
?>
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
      <div class="tabla panel-default" >
        <div class = 'row panel-heading'>
      <span  class ="col-md-2">Nombre del ejercicio</span>  <span  class ="col-md-2">Repeticiones</span>  <span  class ="col-md-2">Carga</span>
    </div>
      <?php foreach($ejerciciosTabla as $it){ ?>
      <form method="post" action="../Controllers/c_Tabla.php?op=4" id="deleleFromTabla<?php echo($it['Ejercicio_idEjercicio']);?>">
        <input type="hidden" name="idTabla" value="<?php echo($_GET['id']);?>"><!--ESTO ES PARA POSTEAR IDTABLA PARA QUE FUNCIONE EL CONTROLLER-->
      </form>
        <?php  $toShow = $ejerciciosController->getEjercicio($it['Ejercicio_idEjercicio']);      ?>
        <form method="post" action="../Controllers/c_Tabla.php?op=5">
          <input type="hidden" name="idTabla" value="<?php echo($_GET['id']);?>"><!--ESTO ES PARA POSTEAR IDTABLA PARA QUE FUNCIONE EL CONTROLLER-->
          <input  type="hidden" name="idEjercicio" value="<?php echo($it['Ejercicio_idEjercicio']);?>"><!--ESTO ES PARA POSTEAR IDTABLA PARA QUE FUNCIONE EL CONTROLLER-->
          <span class ="col-md-2" name=<?php echo($toShow['nomEjercicio']); ?> ><?php echo($toShow['nomEjercicio']);?></span>
          <input class="col-md-2" type="text" name="nRepeticiones" value="<?php echo($it['nRepeticiones']);?>"/>
          <input class="col-md-2" type="text" name="carga" value="<?php echo($it['carga']);?>"/>
          <input class="btn btn-warning col-md-1" type="submit" value="Modificar" />
          <button class="btn btn-danger col-md-1" form="deleleFromTabla<?php echo($it['Ejercicio_idEjercicio']);?>" name="idEjercicio" value = <?php echo("".$it['Ejercicio_idEjercicio']."");?>>Borrar</button>
        </form><br><br><br>
      <?php }?>
    <span class="col-md-2">Añadir un nuevo ejercicio</span>

    <form method="post" action="../Controllers/c_Tabla.php?op=3" id="addEjercicioTabla" onsubmit="return adEjTabla()">
      <select id ="eje" class="col-md-2" name='idEjercicio'>
          <option  value="">--Selecionar--</option>
        <?php foreach($ejercicios as $it){ ?>
          <option value="<?php echo($it['idEjercicio']);?>"><?php echo($it['nomEjercicio']);?></option>
        <?php }?>
      </select>
      <input class="col-md-2" type="text" name="numRepeticiones" placeholder="Numero de repeticiones" id="repeticiones"/>
      <input class="col-md-1" type="text" name="carga" placeholder="carga" id="carga"/>
    </form>
    <button class="btn btn-success" form="addEjercicioTabla" name="idTabla" value = <?php echo("".$_GET['id']."");?>>Añadir</button>
    <br><button onclick="location.href='GestionTablas.php'" class="btn btn-info">Hecho</button>
    </div>
  </body>
</html>
<?php
}
}
?>
