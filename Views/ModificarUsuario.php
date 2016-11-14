<!--Elías 06/11/20016-->
<!DOCTYPE html>
<html>
  <head>
    <title>Modificar Usuario</title>
    <?php
        require_once('NavBar.php');
        require_once('../Controllers/c_Usuario.php');
        require_once("../DB/connectDB.php");

        $usuariosController = new UsuarioController();
        $usuario = $usuariosController->getUsuario($_GET['id']);
        $id = $_GET['id'];
      ?>
   </head>


   <body>
         <div>
            <form method="post" action="../Controllers/c_Usuario.php?op=1" id="modificar">
                Nombre: <input type="text" name="nomUsuario" value="<?php echo($usuario['nomUsuario']);?>" />
                Direccion:  <input type="text" name="direccion" value="<?php echo($usuario['direccion']);?>" />
                Telefono: <input type="text" name="telefono" value="<?php echo($usuario['telefono']);?>" />
                TipoTarjeta: <select name="tipoTarjetaUsuario">
                                <option value="">--Selecionar--</option>
                                <option value="TDU">TDU</option>
                                <option value="PEF">PEF</option>
                              </select></br>
            </form>
              <button type="submit" form="modificar" name="idUsuario" value = <?php echo("".$id."");?>>Modificar</button>
         </div>
    </body>
</html>
