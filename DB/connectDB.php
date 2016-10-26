<?php
class DB {
  private static $db = null;
  
  public static function getDB(){
    if(!isset(DB::$db)){
      $db = new mysqli('localhost', 'abp', 'abp', 'mydb');
      if ($db->connect_errno) {
          printf("Conexión fallida: %s\n", $db->connect_error);
          exit();
      }
    }
    return $db;
     //usuario abp/abp deber ser creado y le deben ser asignados permisos
      //mydb cambiara en futuros dumps SQL
  }
}
?>
