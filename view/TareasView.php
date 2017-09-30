<?php
include_once 'View.php';
class TareasView extends View
{
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
