<?php
class ConfigApi
{
  public static $RESOURCE = 'resource';
  public static $PARAMS = 'params';
  public static $RESOURCES = [
    'tareas#GET' => 'TareasApiController#get',
    'tareas#DELETE' => 'TareasApiController#delete',
    'tareas#POST' => 'TareasApiController#create',
    'tareas#PUT' => 'TareasApiController#update'
  ];
}
?>
