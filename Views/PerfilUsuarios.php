<!-- Raul 30/11/2016-->
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
    <title>Perfil de Usuario</title>
    <?php
        require_once('NavBar.php');
        require_once('../Controllers/c_Usuario.php');
        require_once("../DB/connectDB.php");

        $usuariosController = new UsuarioController();
        $usuario = $usuariosController->getUsuario($usuariosController->getUserByEmail($_SESSION['userID'])['idUsuario']);
        $id = $_SESSION['userID'];
      ?>
   </head>


   <body>
         <div class="tabla">
              <div class="row"><span class="col-md-2">Hola:<?php echo($usuario['nomUsuario']);?> </span></div>
              <div class="row"><span class="col-md-2">Tus datos actuales son:</span></div>
              <br><br>
              <div class="row"><span class="col-md-2">Direccion:  <span><?php echo($usuario['direccion']);?></span></div>
              <div class="row"><span class="col-md-2">Telefono: <span><?php echo($usuario['telefono']);?> </span></div>
              <div class="row"><span class="col-md-2">TipoTarjeta:<span><?php echo ($usuario['tipoTarjeta']);?></span></div>

              <br>
              <hr>
              <div class="row"><span class="col-md-2">Cambiar datos:</span></div>
              <br>
            <form method="post" action="../Controllers/c_Usuario.php?op=5" id="modificar">
                <div class="row"><span class="col-md-2">Direccion:</span>  <input type="text" name="direccion" value="<?php echo($usuario['direccion']);?>" /></div>
                <div class="row"><span class="col-md-2">Telefono:</span> <input type="text" name="telefono" value="<?php echo($usuario['telefono']);?>" /></div>
                </br>
            </form>
              <button class="btn btn-success" type="submit" form="modificar" name="idUsuario" value = <?php echo("".$id."");?>>Guardar</button>

         <form method="post" action="../Controllers/c_Usuario.php?op=0" id="borrar">
         </form>
         <hr>
         <div class="row"><span class="col-md-2">Eliminar cuenta<span></div>
           <br>
         <button class="btn btn-danger" type="submit" form="borrar" name="idUsuario" value = <?php echo($usuario['idUsuario']);?>>Borrar</button>
       </div>
    </body>
</html>
<?php
}
?>
