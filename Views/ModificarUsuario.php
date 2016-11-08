<?php
//Elías 06/11/20016
require_once('../Controllers/c_Usuario.php');
require_once("../DB/connectDB.php");

$usuariosController = new UsuarioController();
$usuario = $usuariosController->getUsuario($_GET['id']);
$id = $_GET['id'];
?>

<form method="post" action="../Controllers/c_Usuario.php?op=1" id="modificar">
  <input type="text" name="nomUsuario" value="<?php echo($usuario['nomUsuario']);?>" />
  <input type="text" name="direccion" value="<?php echo($usuario['direccion']);?>" />
  <input type="text" name="telefono" value="<?php echo($usuario['telefono']);?>" />
</form>

<button type="submit" form="modificar" name="idUsuario" value = <?php echo("".$id."");?>>Modificar</button>
