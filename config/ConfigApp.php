<?php
  class ConfigApp{
    public static $ACTION = 'action';
    public static $PARAMS = 'params';
    public static $ACTIONS = [
      'home' => 'TareasController#index',
      'agregarTarea' => 'TareasController#create',
      'guardarTarea' => 'TareasController#store',
      'borrarTarea' => 'TareasController#delete',
      'templateTest' => 'TareasController#test',
      '' => 'TareasController#index',
      'tareaCompleta' => 'TareasController#complete',
      'login' => 'LoginController#index',
      'verificarUsuario' => 'LoginController#verify',
      'logout' => 'LoginController#destroy'
    ];
  }
?>
