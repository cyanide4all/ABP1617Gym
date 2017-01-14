<!--Elías 06/11/20016-->
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
    $usuario = $usuariosController->getUsuario($_GET['id']);
    if($user['tipoUsuario']=='entrenador' && !($usuario['tipoUsuario']=='deportista')){
      header('Location: paginaPrincipal.php');
    }
    else{
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Modificar Usuario</title>
    <?php
        require_once('NavBar.php');
        require_once('../Controllers/c_Usuario.php');
        require_once("../DB/connectDB.php");

        $usuariosController = new UsuarioController();
        $id = $_GET['id'];
      ?>
   </head>


   <body>
         <div class="tabla">
            <form method="post" action="../Controllers/c_Usuario.php?op=1" id="modificar">
              <div class="row"><span class="col-md-2">Tipo de Usuario:</span> <select name="tipoDeUsuario">
                              <?php if($user['tipoUsuario']=='admin'){ ?>
                              <option value="admin" <?php if($usuario['tipoUsuario']=="admin"){ echo ("selected='selected'");} ?>>Administrador</option>
                              <option value="entrenador" <?php if($usuario['tipoUsuario']=="entrenador"){ echo ("selected='selected'");} ?>>Entrenador</option>
                              <?php } ?>
                              <option value="deportista" <?php if($usuario['tipoUsuario']=="deportista"){ echo ("selected='selected'");} ?>>Deportista</option>
                            </select></div>
                <div class="row"><span class="col-md-2">Nombre:</span> <input type="text" name="nomUsuario" value="<?php echo($usuario['nomUsuario']);?>" /></div>
                <div class="row"><span class="col-md-2">Direccion:</span>  <input type="text" name="direccion" value="<?php echo($usuario['direccion']);?>" /></div>
                <div class="row"><span class="col-md-2">Telefono:</span> <input type="text" name="telefono" value="<?php echo($usuario['telefono']);?>" /></div>
                <div class="row"><span class="col-md-2">TipoTarjeta:</span> <select name="tipoTarjetaUsuario">
                                <option value="TDU" <?php if($usuario['tipoTarjeta']=="TDU"){ echo ("selected='selected'");} ?>>TDU</option>
                                <option value="PEF" <?php if($usuario['tipoTarjeta']=="PEF"){ echo ("selected='selected'");} ?>>PEF</option>
                              </select></div>
            </form>
              <button class="btn btn-success" type="submit" form="modificar" name="idUsuario" value = <?php echo("".$id."");?>>Modificar</button>
         </div>
    </body>
</html>
<?php
}
}
}
?>
