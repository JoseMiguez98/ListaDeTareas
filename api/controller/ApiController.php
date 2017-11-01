<?php
include_once('../model/TareasModel.php');

abstract class ApiController{
  protected $model;

  function __construct(){
    $this->model = new TareasModel();
  }

  //Retorna un JSON y le comunica el estado a HTTP
  protected function json_response($data, $status) {
    header("Content-Type: application/json");
    header("HTTP/1.1 " . $status . " " . $this->_requestStatus($status));
    return json_encode($data);
  }

  //Retorna el mensaje de el estado HTTP
  protected function _requestStatus($code){
    $status = array(
      200 => "OK",
      404 => "Not found",
      500 => "Internal Server Error"
    );
    return ($status[$code])? $status[$code] : $status[500];
  }
}
?>
