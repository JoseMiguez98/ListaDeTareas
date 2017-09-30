<?php
include_once('Controller.php');
include_once('view/LoginView.php');
include_once('model/LoginModel.php');
class LoginController extends Controller
{
  function __construct()
  {
      $this->view = new LoginView();
      $this->model = new LoginModel();
  }
  function index(){
    $tareas = $this->model->getTareas();
    $this->view->mostrarTareas($tareas);
  }
}
 ?>
