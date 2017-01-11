<!--Elías 06/11/2016-->
<!DOCTYPE html>
<html>
  <head>
    <title>Crear Usuario</title>
    <?php
        require_once('NavBar.php');
        require_once('../Controllers/c_Usuario.php');
        require_once("../DB/connectDB.php");

        $usuariosController = new UsuarioController();

    ?>
<body>
  <div class="tabla">
    <div class="row">
      <form method="post" action="../Controllers/c_Usuario.php?op=2">
        <div class="row"><span class="col-md-2">Tipo de Usuario:</span> <select name="tipoDeUsuario">
                        <option value="">--Selecionar--</option>
                        <option value="admin">Administrador</option>
                        <option value="entrenador">Entrenador</option>
                        <option value="deportista">Deportista</option>
                      </select></div>
        <div class="row"><span class="col-md-2">Nombre:</span> <input type="text" name="nomUsuario" placeholder="Nombre"  /></div>
        <div class="row"><span class="col-md-2">Direccion:</span> <input type="text" name="dircUsuario" placeholder="Direccion" /></div>
        <div class="row"><span class="col-md-2">Telefono:</span> <input type="text" name="telfUsuario" placeholder="Telefono" /></div>
      <div class="row"><span class="col-md-2">  Tipo de Tarjeta:</span> <select name="tipoTarjetaUsuario">
                        <option value="">--Selecionar--</option>
                        <option value="TDU">TDU</option>
                        <option value="PEF">PEF</option>
                      </select></div>
      <div class="row"><span class="col-md-2">  Dni:</span> <input type="text" name="dniUsuario" placeholder="Dni" /></div>
        <div class="row"><span class="col-md-2">Fecha de Nacimiento:</span> <input type="text" name="fechNacUsuario" placeholder="AAAA:MM:DD" /></div>
      <div class="row"><span class="col-md-2">  Email:</span> <input type="text" name="emailUsuario" placeholder="ejemplo@dominio.com" /></div>
      <div class="row"><span class="col-md-2">  Contraseña:</span> <input type="password" name="passUsuario" placeholder="Pass" /></div>
      <div class="row"><span class="col-md-2">Repetir Contraseña:</span> <input type="password" name="passUsuario2" placeholder="Pass" /></div>
          <input class="btn btn-success" type="submit" name="idUsuario">
      </form>
    </div>
    </div>
  </body>
</html>
