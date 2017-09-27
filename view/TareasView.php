<?php
include_once 'libs/Smarty.class.php';
class TareasView
{
  private $smarty;

  //El constructor crea una nueva instancia de smarty ya que esta clase es el 'view'
  function __construct()
  {
    //Creo el objeto Smarty
    $this->smarty = new Smarty();
  }

  function mostrarTareas($tareas){
    //Declaro una nueva variable 'tarea' propia del Template y le asigno el valor de $tareas[]
    $this->smarty->assign('tareas', $tareas);
    $this->smarty->display('templates/index.tpl');
  }
}

 ?>
