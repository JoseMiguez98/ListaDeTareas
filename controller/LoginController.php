<?php
include_once('Controller.php');
include_once('./view/LoginView.php');
include_once('./model/LoginModel.php');

class LoginController extends Controller
{
  function __construct()
  {
      $this->view = new LoginView();
      $this->model = new LoginModel();
  }
  function index(){
    $this->view->mostrarLogin();
  }

  function verify(){
    //Almaceno los datos ingresados por el usuario que fueron recibidos por post
    $userName = $_POST['user'];
    $userPassword = $_POST['password'];
    //Checkeo que ninguno de los campos este vacio
    if(!empty($userName) && !empty($userPassword)){
      $user = $this->model->getUser($userName);
      //SI el usuario existe en la BBDD y el password coincide entonces le doy acceso a la lista de tareas
      if(!empty($user) && password_verify($userPassword, $user[0]['password'])){
        //Creo una sesión de usuario en el server
        session_start();
        //Seteo el nombre del usuario propietario de las sesión
        $_SESSION['usuario'] = $userName;
        //Inicializo un contador de tiempo de la sesión
        $_SESSION['LAST_ACTIVITY'] = time();
        header('Location:'.HOME);
    }
    else{
      $this->view->loginError('El usuario o contraseña son incorrectos');
    }
  }
    //En caso de estarlos, le digo a la vista que muestre un error
    else{
      $this->view->loginError('El campo usuario o contraseña esta vacio');
    }
  }

  function destroy(){
    session_start();
    session_destroy();
    header('Location:'.LOGIN);
  }
}
 ?>
