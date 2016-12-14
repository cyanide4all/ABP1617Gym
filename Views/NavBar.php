<!-- Martin 14/11/16
NAVBAR provisional con muchisimo work que  hacer
TODO: Hacerlo responsivo al tipo de usuario
TODO: Hacerlo bien y bonito
-->
<?php
session_start();
require_once("../Controllers/c_Notificaciones.php");
require_once("../Controllers/c_Usuario.php");
?>
<div class= "NavBar">
  <nav>
    <a href="paginaPrincipal.php">Inicio</a> |
    <a href="GestionEjercicios.php">Gestión de Ejercicios</a> |
    <a href="GestionActividades.php">Gestión de Actividades</a> |
    <a href="GestionTablas.php">Gestión de Tablas</a> |
    <a href="ListaActividades.php">Lista de Actividades</a> |
    <a href="MisActividadesReservadas.php">Mis reservas</a> |
    <a href="MisEstadisticas.php">Mis estadisticas</a> |
    <a href="GestionUsuarios.php">Gestión de Usuarios</a> |
    <?php
    if(isset($_SESSION['userID'])){
      $userController = new UsuarioController();
      $user = $userController->getUserByEmail($_SESSION['userID']);
      $notificacionesController = new NotificacionesController();
      $notificaciones = $notificacionesController->getNotificaciones($user["idUsuario"]);
      $dibujadas = array();
    ?>

    <a> Notificaiones (<?php echo(count($notificaciones)); ?>)</a>
    <ul class="itemNotificacion dropdown-menu" aria-labelledby="dropdownMenu1">

    <?php
      foreach($notificaciones as $n){
        if(!in_array($n["contenido"], $dibujadas)){
          array_push($dibujadas, $n["contenido"]); //Consideramos añadir TRUE como tercer parametro si esto falla
    ?>
      <li>
        <?php echo $n["contenido"];?>
      </li>

    <?php
        }//Cierre de if
      } //cierre de foreach
      if(count($notificaciones)>0){
    ?>

      <form method="post" action="../Controllers/c_Notificaciones.php?id=1">
        <input type="submit" value="Borrar Notificaciones"/>
      </form>
    </ul>
    <?php
      } //Cierre de if
    } //cierre de if
    ?>
    | <a>Usuario actual: <?php if(isset($_SESSION['userID'])){ echo ("<a href=../Views/PerfilUsuarios.php>".$_SESSION['userID']."</a>");}else{echo("anonimo");}?></a>
    <?php if(isset($_SESSION['userID'])){ ?>
    <a href="../Controllers/c_Usuario.php?op=4"> salir</a>
    <?php }else{ ?>
    <a href="LogIn.php">login</a>
    <?php } ?>
  </nav>
</div>
<hr>
