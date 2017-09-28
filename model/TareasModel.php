<?php
//Clase encargada de controlar todo lo que es logica y procesamiento de datos

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

  function guardarTarea($titulo, $descripcion, $completado){
    $sentencia = $this->db->prepare('INSERT INTO tarea(titulo, descripcion, completado) VALUES(?,?,?)');
    //La ejecuto y le paso un array con los datos que entren por parametro
    $sentencia->execute([$titulo, $descripcion, $completado]);
  }

  function borrarTarea($id_tarea){
      //Preparo la sentencia delete, en el signo de pregunta entra el parametro
      $sentencia = $this->db->prepare("delete from tarea where id_tarea=?");
      return $sentencia->execute([$id_tarea]);
  }
}

 ?>
