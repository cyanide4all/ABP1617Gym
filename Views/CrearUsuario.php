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
      <form method="post" action="../Controllers/c_Usuario.php?op=2">
        Tipo de Usuario: <select name="tipoDeUsuario">
                        <option value="">--Selecionar--</option>
                        <option value="admin">Administrador</option>
                        <option value="entrenador">Entrenador</option>
                        <option value="deportista">Deportista</option>
                      </select></br>
        Nombre: <input type="text" name="nomUsuario" placeholder="Nombre"  /></br>
        Direccion: <input type="text" name="dircUsuario" placeholder="Direccion" /></br>
        Telefono: <input type="text" name="telfUsuario" placeholder="Telefono" /></br>
        Tipo de Tarjeta: <select name="tipoTarjetaUsuario">
                        <option value="">--Selecionar--</option>
                        <option value="TDU">TDU</option>
                        <option value="PEF">PEF</option>
                      </select></br>
        Dni: <input type="text" name="dniUsuario" placeholder="Dni" /></br>
        Fecha de Nacimiento: <input type="text" name="fechNacUsuario" placeholder="AAAA:MM:DD" /></br>
        Email: <input type="text" name="emailUsuario" placeholder="ejemplo@dominio.com" /></br>
        Contraseña: <input type="password" name="passUsuario" placeholder="Pass" /></br>
        Repetir Contraseña: <input type="password" name="passUsuario2" placeholder="Pass" /></br>
          <input type="submit" name="idUsuario">
      </form>
  </body>
</html>
