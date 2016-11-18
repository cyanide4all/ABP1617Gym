<!-- Martin 14/11/16
NAVBAR provisional con muchisimo work que  hacer
TODO: Hacerlo responsivo al tipo de usuario
TODO: Hacerlo bien y bonito
-->
<?php session_start();?>
<div class= "NavBar">
  <nav>
    <a href="paginaPrincipal.php">Inicio</a> |
    <a href="GestionEjercicios.php">Gestión de Ejercicios</a> |
    <a href="GestionActividades.php">Gestión de Actividades</a> |
    <a href="GestionTablas.php">Gestión de Tablas</a> |
    <a href="ListaActividades.php">Lista de Actividades</a> |
    <a href="MisActividadesReservadas.php">Mis reservas</a> |
    <a href="GestionUsuarios.php">Gestión de Usuarios</a> | Usuario actual: <?php if(isset($_SESSION['userID'])){ echo ($_SESSION['userID']);}else{echo("anonimo");}?>

  </nav>
</div>
<hr>
