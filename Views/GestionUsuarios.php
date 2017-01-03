<!--Elías 06/11/2016-->
<!DOCTYPE html>
<html>
  <head>
    <title>Gestion de Usuarios</title>
    <?php
        require_once('NavBar.php');
        require_once('../Controllers/c_Usuario.php');
        require_once("../DB/connectDB.php");

        $usuariosController = new UsuarioController();
        $usuarios = $usuariosController->gestionUsuarios();
        ?>

  </head>

    <body>
        <div id = 'tabla4elementos' >
            <div class = 'tupla'>
                <a class="izquierda">Email</a> <a class = 'izquierda'>Nombre de Usuario</a> <a>Tipo</a> <a clas = 'derecha'>Opciones</a>
            </div>
            <?php foreach($usuarios as $it){ ?>
            <div class = 'tupla'>
              <a class = 'izquierda'><?php echo ($it['email']); ?></a> -
              <a class = 'medio'><?php echo ($it['nomUsuario']); ?></a> -
              <a class = "izquierda"><?php echo($it['tipoUsuario']);?></a>

              <form method= "post" action = "../Controllers/c_Usuario.php?op=0" class ='derecha' id="borrar">
              </form>
            <button type="submit" form="borrar" name="idUsuario" value = <?php echo("".$it['idUsuario']."");?>>Borrar</button>
          	<button onclick="location.href='ModificarUsuario.php?id=<?php echo($it['idUsuario']);?>'">Modificar</button>
            </div>

  <?php } ?>
            <button onclick="location.href='CrearUsuario.php'">Crear Nuevo Usuario</button>
            </div>
    </body>
</html>
