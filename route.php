<?php
  include_once 'config/ConfigApp.php';
  include_once 'controller/TareasController.php';
  include_once 'controller/LoginController.php';

   function parseURL($url){
     //Explodeo la url para convertirla en un array
     $urlExploded = explode('/' ,$_GET['action']);
     //Creo un nuevo array y en la posición 'action' le asigno la acción recibida
     $arrayReturn[ConfigApp::$ACTION] = $urlExploded[0];
     //Si esta seteado, llama al metodo array_slice(), lo que hace este metodo es crear un arrego a partir de una posición dada, en este caso desde la posición 1
     //Y se lo asigno a la posición 'params'
     $arrayReturn[ConfigApp::$PARAMS] = isset($urlExploded[1]) ? array_slice($urlExploded, 1) : null;

     return $arrayReturn;
   }

      if(isset($_GET['action'])){
      $parsedURL = parseURL($_GET['action']);
      $action = $parsedURL[ConfigApp::$ACTION];
      //Controlo si existe la accion pedida en el arreglo de acciones disponibles de 'ConfigApp.php'
      if(array_key_exists($action , ConfigApp::$ACTIONS)){
        $action = explode('#', ConfigApp::$ACTIONS[$action]);
        $controller = new $action[0]();
        $method = $action[1];
        $params = $parsedURL[ConfigApp::$PARAMS];
        if(isset($params) && $params != null){
          echo $controller->$method($params);
        }
        else{
          echo $controller->$method();
        }
      }
    }

 //  include_once 'config/ConfigApp.php';
 //  include_once 'index.php';
 //  //Metodo que parsea la URL y retorna un array ordenado. ['action' => accion, 'params' => parametros]
 //  function parseURL($url){
 //    //Explodeo la url para convertirla en un array
 //    $urlExploded = explode('/' ,$_GET['action']);
 //    //Creo un nuevo array y en la posición 'action' le asigno la acción recibida
 //    $arrayReturn[ConfigApp::$ACTION] = $urlExploded[0];
 //    //Si esta seteado, llama al metodo array_slice(), lo que hace este metodo es crear un arrego a partir de una posición dada, en este caso desde la posición 1
 //    $arrayReturn[ConfigApp::$PARAMS] = isset($urlExploded[1]) ? array_slice($urlExploded, 1) : null;
 //
 //    return $arrayReturn;
 //  }
 //
 //    if(isset($_GET['action'])){
 //    $parsedURL = parseURL($_GET['action']);
 //    $action = $parsedURL[ConfigApp::$ACTION];
 //    //Controlo si existe la accion pedida en el arreglo de acciones disponibles de 'ConfigApp.php'
 //    if(array_key_exists($action , ConfigApp::$ACTIONS)){
 //      $params = $parsedURL[ConfigApp::$PARAMS];
 //      $method = ConfigApp::$ACTIONS[$action];
 //      if(isset($params) && $params != null){
 //        echo $method($params);
 //      }
 //      else{
 //        echo $method();
 //      }
 //    }
 //  }
 //
 // //    if($action_array[ACTION] === 'sumar'){
 // //      echo sumar($action_array[VALOR1], $action_array[VALOR2]);
 // //    }
 // //
 // //    elseif($action_array[ACTION] === 'about'){
 // //      if(isset($action_array[VALOR1]) && $action_array[VALOR1] === 'jose'){
 // //        echo about($action_array[VALOR1]);
 // //      }
 // //      else{
 // //        echo about();
 // //      }
 // //    }
 // //    elseif($action_array[ACTION] === 'pi'){
 // //      echo piNumber();
 // //    }
 // //  }
  ?>
