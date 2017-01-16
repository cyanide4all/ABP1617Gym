<!--Martin 14/11/16-->
<?php
//Ser admin
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

  if(!$user['tipoUsuario']=='admin'){
    header('Location: paginaPrincipal.php');
  }
  else{
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Crear Ejercicio</title>
    <?php
      require_once('NavBar.php');
      require_once('../Controllers/c_Ejercicio.php');
      require_once("../DB/connectDB.php");

      $ejerciciosController = new EjercicioController();

      ?>
  </head>



  <body>
    <div class="tabla">
      <form method="post" action="../Controllers/c_Ejercicio.php?op=2" onsubmit="return validarNombreCategoria()">
        <div class="row"><span class="col-md-2">Nombre:</span><input id='nombre' type="text" name="nomEjercicio" placeholder="Nombre" /></div>
        <div class="row"><span class="col-md-2">Descripción:</span><input type="text" name="desEjercicio" placeholder="Descripcion" /></div>
        <!-- TODO: Almacenar las opciones del combobox en un archivo a parte-->
        <div class="row">
          <span class="col-md-2">
          Categoria:</span>  <select id='categoria' name="catEjercicio">
                      <option value="">--Selecionar--</option>
                      <option value="Brazo">Brazo</option>
                      <option value="Pierna">Pierna</option>
                      <option value="Espalda">Espalda</option>
                    </select></br>
                    <input type="hidden" name="idEjercicio"/>
        </div>
        <input type="submit" value="Crear" class="btn btn-success">
      </form>
    </div>
  </div>
  </body>
</html>
<?php
}
}
?>
