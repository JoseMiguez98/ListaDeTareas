<?php
include_once('controller/ApiController.php');

class TareasApiController extends ApiController
{
  function __construct()
  {
    parent::__construct();
  }

  //Pido la/s tarea/s al modelo y las retorno en formato JSON
  function get($params=[]){
    switch (sizeof($params)) {
      case 0:
      $tareas = $this->model->getTareas();
      return $this->json_response($tareas, 200);
      break;
      case 1:
      $id_tarea = $params[0];
      $tarea = $this->model->getTarea($id_tarea);
      if($tarea){
        return $this->json_response($tarea, 200);
      }
      else {
        return $this->json_response(false, 404);
      }
      break;
      default:
      return $this->json_response(false, 404);
      break;
    }
  }
}
?>
