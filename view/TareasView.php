<?php
include_once 'View.php';

class TareasView extends View
{
  //El constructor crea una nueva instancia de smarty ya que esta clase es el 'view'
  function __construct()
  {
    //Creo el objeto Smarty
    $this->smarty = new Smarty();
    $this->smarty->assign('titulo', 'MVC Tareas');
  }

  function mostrarTareas($tareas){
    //Declaro una nueva variable 'tarea' propia del Template y le asigno el valor de $tareas[]
    $this->smarty->assign('tareas', $tareas);
    $this->smarty->display('templates/index.tpl');
  }

  function mostrarCrearTareas(){
    $this->smarty->display('templates/formCrear.tpl');
  }

  function errorCrear($error){
    $this->smarty->assign('error', $error);
    $this->smarty->display('templates/formCrear.tpl');
  }
}

 ?>
