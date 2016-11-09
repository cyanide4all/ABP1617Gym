<?php
//Elías 06/11/2016
require_once('../Controllers/c_Usuario.php');
require_once("../DB/connectDB.php");

$usuariosController = new UsuarioController();
$usuarios = $usuariosController->gestionUsuarios();
?>

Aqui va un NavBar

<div id = 'tabla2elementos' >
  <div class = 'tupla'>
    <a clas = 'izquierda'>Nombre de Usuario</a> <a clas = 'derecha'>Opciones</a>
  </div>
  <?php foreach($usuarios as $it){ ?>
  <div class = 'tupla'>
    <a clas = 'izquierda'><?php echo ($it['nomUsuario']); ?> </a>
    <form method= "post" action = "../Controllers/c_Usuario.php?op=0" class ='derecha' id="borrar">
    </form>
	<button type="submit" form="borrar" name="idUsuario" value = <?php echo("".$it['idUsuario']."");?>>Borrar</button>
	<button onclick="location.href='ModificarUsuario.php?id=<?php echo($it['idUsuario']);?>'">Modificar</button>
  </div>

  <?php } ?>
  <button onclick="location.href='CrearUsuario.php'">Crear Nuevo Usuario</button>
</div>
