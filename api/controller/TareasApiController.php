<?php
include_once('controller/ApiController.php');

class TareasApiController extends ApiController
{
  function __construct()
  {
    parent::__construct();
    $this->model = new TareasModel();
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

  //Borra las tareas del modelo y retorna una respuesta json
  function delete($params=[]){
    switch (sizeof($params)) {
      case 0:
      return $this->json_response("Debe especificar una tarea", 400);
      break;

      case 1:
      $id_tarea = $params[0];
      $tarea = $this->model->getTarea($id_tarea);
      if($tarea){
        $this->model->borrarTarea($id_tarea);
        return $this->json_response("Tarea eliminada con exito", 200);
      }
      else{
        return $this->json_response("No existe una tarea con ese ID", 404);
      }
      break;

      default:
      return $this->json_response(false, 400);
      break;
    }
  }

  function create($params=[]){
    if (sizeof($params) == 0){
      $data = $this->getJSONData();
      //$data contiene un array con un JSON(raw_data)
      $titulo = $data[0]->titulo;
      $descripcion = $data[0]->descripcion;
      $completado = $data[0]->completado;
      $this->model->guardarTarea($titulo, $descripcion, $completado);
      $tareas = $this->model->getTareas();
      return $this->json_response($tareas, 200);
    }
    else{
      return $this->json_response(false, 400);
    }
  }

  function update($params=[]){
    if (sizeof($params) == 1){
      $data = $this->getJSONData();
      //$data contiene un array con un JSON(raw_data)
      if(isset($data)){
        //params[0] es el id de la tarea
        $response = $this->model->actualizarTarea($params[0], $data);
        return $this->json_response($response, 200);
      }
    }
    else{
      return $this->json_response('Ingrese el ID de la tarea que desea modificar', 400);
    }
  }
}
?>
