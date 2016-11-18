<?php
//Martín 26/10/16
//Pagina provisional para facilitar el acceso durante la programacion
require_once('NavBar.php');
require_once('../DB/connectDB.php');
?>
<form method="post" action="../Controllers/c_Usuario.php?op=3">
email:  <input type="text" name="email" placeholder="ejemplo@gmail.com"/></br>
pass:   <input type="password" name="pass" placeholder="************"/></br>
<input type="hidden" name="idUsuario" value="placeholder"/><!--necesario para reutilizar el controller de usuario-->
<input type="submit" value="login"/>
</form>
