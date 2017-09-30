<?php
include_once('Controller.php');
include_once('view/TareasView.php');
include_once('model/TareasModel.php');
class TareasController extends Controller
{
  //EL constructor crea las instancias de vista y modelo ya que es el intermediario
  function __construct()
  {
      $this->view = new TareasView();
      $this->model = new TareasModel();
  }
  //Metodo que le pide las tareas al modelo y les dice al view que las muestre
  function index(){
    $tareas = $this->model->getTareas();
    $this->view->mostrarTareas($tareas);
  }
  //Metodo que le pide al view que muestre el form para crear nuevas tareas
  function create(){
    $this->view->mostrarCrearTareas();
  }
  //Metodo que crea nuevas tareas en la BD
  function store(){
    //Si el tiutlo existe entonces prepara los parametros y se los envia al modelo para que los inserte
    if(isset($_POST['titulo']) && $_POST['titulo'] != null){
      $titulo = $_POST['titulo'];
      $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : null;
      $completado = isset($_POST['completado']) ? $_POST['completado'] : 0;
      $this->model->guardarTarea($titulo, $descripcion, $completado);
      header('Location:'.HOME);
    }
    //Si no le dice a la vista que comunique el error
    else{
      $this->view->errorCrear('El campo titulo es requerido');
    }
  }
  //Le digo al modelo que borre la tarea recibida por parametro
  function delete($id_tarea){
    $this->model->borrarTarea($id_tarea[0]);
    header('Location:'.HOME);
  }
  //Le digo al modelo que complete la tarea recibida por parametro
  function complete($params){
    $this->model->finalizarTarea($params[0]);
    header('Location:'.HOME);
  }
}
 ?>
