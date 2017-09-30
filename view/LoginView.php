<?php
include_once 'View.php';

class LoginView extends View
{
  function mostrarLogin(){
    $this->smarty->display('templates/login/index.tpl');
  }

  function loginError($error){
    $this->smarty->assign('error', $error);
    $this->smarty->display('templates/login/index.tpl');
  }
}
 ?>
