<!-- Martin 14/11/16
TODO: Hacerlo responsivo al tipo de usuario
-->


<!--Este script contiene las funciones referentes a la comprobación de formularios-->
<script>
<?php include("../js/FormCheck.js");?>
</script>
<!--HASTA AQUI-->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
<?php
session_start();
require_once("../Controllers/c_Notificaciones.php");
require_once("../Controllers/c_Usuario.php");
$logged = false;
if(isset($_SESSION['userID'])){
  $logged = true;
}

?>

<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
<nav class="navbar navbar-default">
  <div class="container-fluid">
  <div class= "collapse navbar-collapse">
    <ul class="nav navbar-nav">
      <li><a href="paginaPrincipal.php">Inicio</a></li>
      <!--Este dropdown solo se ve si tienes permisos de admin o entrenador-->
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestión <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="GestionEjercicios.php">Gestión de Ejercicios</a></li>
          <li><a href="GestionActividades.php">Gestión de Actividades</a></li>
          <li><a href="GestionTablas.php">Gestión de Tablas</a></li>
          <li><a href="GestionUsuarios.php">Gestión de Usuarios</a></li>
        </ul>
      </li>
      <!--HASTA AQUI -->
      <li><a href="ListaActividades.php">Lista de Actividades</a></li>
      <li><a href="MisActividadesReservadas.php">Mis reservas</a></li>
      <li><a href="ListaTablas.php">Entrenamiento</a></li>
      <li><a href="MisEstadisticas.php">Mis estadisticas</a></li>


      <?php
      if($logged){
        $userController = new UsuarioController();
        $user = $userController->getUserByEmail($_SESSION['userID']);
        $notificacionesController = new NotificacionesController();
        $notificaciones = $notificacionesController->getNotificaciones($user["idUsuario"]);
        $dibujadas = array();
      ?>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Notificaciones (<?php echo(count($notificaciones)); ?>) <span class="caret"></span></a>
        <ul class="dropdown-menu">
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
          <?php
            } //Cierre de if
          ?>
          </ul>
        </li>
      <?php
          } //cierre de if
      ?>

      <li><?php if($logged){echo ("<a href=../Views/PerfilUsuarios.php>".$_SESSION['userID']."</a>");}else{echo("<a>anonimo</a>");}?></li>
      <?php if($logged){ ?>
      <li><a href="../Controllers/c_Usuario.php?op=4"> salir</a></li>
      <?php }else{ ?>
      <li><a href="LogIn.php">login</a></li>
      <?php } ?>
    </ul>
    </nav>
  </div>
</div>
