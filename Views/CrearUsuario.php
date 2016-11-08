<?php
//Elías 06/11/2016
require_once('../Controllers/c_Usuario.php');
require_once("../DB/connectDB.php");

$usuariosController = new UsuarioController();

?>

<form method="post" action="../Controllers/c_Usuario.php?op=2">
  <input type="text" name="nomUsuario" value="Nombre" />
  <input type="text" name="dircUsuario" value="Direccion" />
  <input type="text" name="telfUsuario" value="Telefono" />
  <input type="text" name="tipoTarjetaUsuario" value="TipoTarjeta" />
  <input type="text" name="dniUsuario" value="Dni" />
  <input type="text" name="fechNacUsuario" value="FechaNac" />
  <input type="text" name="emailUsuario" value="Email" />
  <input type="text" name="passUsuario" value="Pass" />
  <input type="submit" name="idUsuario">
</form>
