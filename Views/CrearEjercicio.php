<?php
//Martín secreto 4/11/16
require_once('../Controllers/c_Ejercicio.php');
require_once("../DB/connectDB.php");

$ejerciciosController = new EjercicioController();

?>

<form method="post" action="../Controllers/c_Ejercicio.php?op=2">
  <input type="text" name="nomEjercicio" value="Nombre" />
  <input type="text" name="desEjercicio" value="Descripcion" />
  <input type="text" name="catEjercicio" value="Categoria" />
  <input type="submit" name="idEjercicio">
</form>