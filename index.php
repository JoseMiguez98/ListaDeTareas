<?php
include_once 'tareasDB.php';
include_once 'libs/Smarty.class.php';
define ('HOME', 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/');

function tareaCompleta($params){
  finalizarTarea($params[0]);
  header('Location:'.HOME);
}

function borrarTarea($params){
  deleteTarea($params[0]);
  header('Location:'.HOME);
}
function agregarTarea(){
  $titulo = $_POST['titulo'];
  $descripcion = $_POST['descripcion'];
  $completado = isset($_POST['completado']) ? $_POST['completado'] : 0;
  insertTarea($titulo, $descripcion, $completado);
  //Redirigo la pagina al home, pongo la ruta completa por que el header() no es relativo;
  header('Location:'.HOME);
}

function home(){
  $tareas = getTareas();
  $titulo = 'To do app';
  //Creo el objeto Smarty
  $smarty = new Smarty();
  //Declaro una nueva variable 'titulo' propia del Template y le asigno el valor de $titulo
  $smarty->assign('titulo', $titulo);
  //Declaro una nueva variable 'tarea' propia del Template y le asigno el valor de $tareas[]
  $smarty->assign('tareas', $tareas);
  //Le paso la variable por parametro al Template
  //Abre una ventana aparte con un debugger
  $smarty->debugging = true;
  $smarty->display('templates/index.tpl');
}
