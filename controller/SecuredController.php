<?php
include_once 'Controller.php';

class SecuredController extends Controller{

  //Verifico si hay un user loggeado, en caso de que no haya lo redirijo al login
  function __construct(){
    session_start();
    if(!isset($_SESSION['usuario'])){
      header('Location:'.LOGIN);
      die();
    }
  }
}
 ?>
