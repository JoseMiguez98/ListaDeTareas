<?php
  class ConfigApp{
    public static $ACTION = 'action';
    public static $PARAMS = 'params';
    public static $ACTIONS = [
      'home' => 'home',
      'agregarTarea' => 'agregarTarea',
      'borrarTarea' => 'borrarTarea',
      '' => 'home',
      'tareaCompleta' => 'tareaCompleta',
      'tareas' => 'mostrarTareas'
    ];
  }
?>
