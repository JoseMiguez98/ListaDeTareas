<?php

class TareasModel
{
  private $db;

  //Este constructor establece la conexión con la base de datos
  function __construct()
  {
    $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tareas;charset=utf8', 'root', '');
  }

  function getTareas()
  {
    $sentencia = $this->db->prepare("select * from tarea");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }
}

 ?>
