<?php
include_once('view/TareasView.php');
include_once('model/TareasModel.php');

class TareasController
{
  private $view;
  private $model;

  //EL constructor crea las instancias de vista y modelo ya que es el intermediario
  function __construct()
  {
      $this->view = new TareasView();
      $this->model = new TareasModel();
  }

  function index(){
    $tareas = $this->model->getTareas();
    $this->view->mostrarTareas($tareas);
  }
}

 ?>
