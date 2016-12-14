<!-- Raul 30/11/2016-->
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
         <div>
              <a>Hola:<?php echo($usuario['nomUsuario']);?> </a><br>
              <a>Tus datos actuales son:</a>
              <br><br>
              Direccion:  <a><?php echo($usuario['direccion']);?><a/><br>
              Telefono: <a><?php echo($usuario['telefono']);?> <a/><br>
              TipoTarjeta:<a><?php echo ($usuario['tipoTarjeta']);?></a></br>

              <a>
              <hr>
            <form method="post" action="../Controllers/c_Usuario.php?op=5" id="modificar">
                Direccion:  <input type="text" name="direccion" value="<?php echo($usuario['direccion']);?>" />
                Telefono: <input type="text" name="telefono" value="<?php echo($usuario['telefono']);?>" />
                </br>
            </form>
              <button type="submit" form="modificar" name="idUsuario" value = <?php echo("".$id."");?>>Guardar</button>
         </div>
         <hr>
         <form method="post" action="../Controllers/c_Usuario.php?op=0" id="borrar">
         </form>
         <button type="submit" form="borrar" name="idUsuario" value = <?php echo($usuario['idUsuario']);?>>Borrar</button>
    </body>
</html>
