<?php
//Martín 26/10/16
//Pagina provisional para facilitar el acceso durante la programacion
require_once('NavBar.php');
require_once('../DB/connectDB.php');
?>
	<!--estilos para el botn de login -->
<link href="../bootstrap/custom.css" rel="stylesheet">
<div class="container">

	<form method="post" action="../Controllers/c_Usuario.php?op=3" class="form-signin">
	<h2 class="form-signin-heading">Porfavor logeate</h2>
<div class="row">
    <span class="col-md-2">email:  <input type="text" name="email" placeholder="ejemplo@gmail.com"/></span>
  </div>
<div class="row">
    <span class="col-md-2">pass:   <input type="password" name="pass" placeholder="************"/></span>
</div>
	<input type="hidden" name="idUsuario" value="placeholder"/><!--necesario para reutilizar el controller de usuario-->
<br>
<div class="row">
	<input type="submit" value="login" class="btn btn-lg btn-primary btn-block"/>
</div>

	</form>
</div>
