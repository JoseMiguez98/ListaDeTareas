<?php
//Clase encagada de controlar la View, con sus respectivos metodos
include_once 'libs/Smarty.class.php';

class View
{
  protected $smarty;
  function __construct()
  {
    $this->smarty = new Smarty();
    $this->smarty->assign('titulo', 'MVC Tareas');
  }
}
?>
