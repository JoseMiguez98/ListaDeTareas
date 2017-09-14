<?php
  function getTareas(){
    $db = conectarBD();
    //Consulta que voy a realizar sobre la BD
    $sentencia = $db->prepare("select * from tarea");
    //Se ejecuta la sentencia
    $sentencia->execute();
    //fetchAll() trae todas las filas de una tabla
    //print_r($sentencia->fetchAll());

    //La función exec($SqlQuery) ejecuta un comando SQL:
    //$db->exec("INSERT INTO tarea(Titulo)"."VALUES('".$tarea."')");
    //Pero no se recomienda usarla por que no previene ataques SQL Injection

    //Retorno todas las filas de la tabla, ASSOC() las devuelve indexada por su nombre de columna
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function insertTarea($titulo, $descripcion, $completado){
    $db  = conectarBD();
    //Preparo la sentencia que inserta los datos en la tabla para su posterior uso
    $sentencia = $db->prepare('INSERT INTO tarea(titulo, descripcion, completado) VALUES(?,?,?)');
    //La ejecuto y le paso un array con los datos que entren por parametro
    $sentencia->execute([$titulo, $descripcion, $completado]);
  }

  function deleteTarea($id_tarea){
    $db = conectarBD();
    //Preparo la sentencia delete, en el signo de pregunta entra el parametro
    $sentencia = $db->prepare("delete from tarea where id_tarea=?");
    return $sentencia->execute([$id_tarea]);
  }

  //Marco una tarea como completa luego de que esta fue creada
  function finalizarTarea($id_tarea){
    $db = conectarBD();
    $sentencia = $db->prepare('update tarea set completado=1 where id_tarea=?');
    return $sentencia->execute([$id_tarea]);
  }

  function conectarBD(){
  //Creo la conexión con la base de datos
    return new PDO('mysql:host=localhost;'.'dbname=db_tareas;charset=utf8', 'root', '');
  }
?>
