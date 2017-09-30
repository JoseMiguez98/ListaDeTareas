<?php
include_once 'Model.php';

class LoginModel extends Model
{
  function getUser($userName)
  {
    $sentencia = $this->db->prepare("select * from usuario where usuario=?");
    $sentencia->execute([$userName]);
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }
  //
  // function guardarTarea($titulo, $descripcion, $completado){
  //   $sentencia = $this->db->prepare('INSERT INTO tarea(titulo, descripcion, completado) VALUES(?,?,?)');
  //   //La ejecuto y le paso un array con los datos que entren por parametro
  //   $sentencia->execute([$titulo, $descripcion, $completado]);
  // }
  //
  // function borrarTarea($id_tarea){
  //     //Preparo la sentencia delete, en el signo de pregunta entra el parametro
  //     $sentencia = $this->db->prepare("delete from tarea where id_tarea=?");
  //     return $sentencia->execute([$id_tarea]);
  // }
  //
  // //Marco una tarea como completa luego de que esta fue creada
  // function finalizarTarea($id_tarea){
  //   $sentencia = $this->db->prepare('update tarea set completado=1 where id_tarea=?');
  //   return $sentencia->execute([$id_tarea]);
  // }
}

 ?>
