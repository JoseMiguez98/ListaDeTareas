<!--Incluyo otro template en el que tengo el "Molde" del header"-->
{include file="header.tpl"}
<!---->
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <h1>Lista de tareas</h1>
    <button id="refresh" type="button" class="btn btn-default btn-xs pull-right" aria-label="Refresh">
      <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
    </button>
    <a href="agregarTarea">Agregar tarea</a>
    {include file="tareas.tpl"}
    <!-- <?php
    //Inserto la data recibida en una lista
    foreach ($tareas as $tarea) {
    //Si la tarea esta completada la inserto tachada
    if ($tarea['completado']) {
    echo '<li class="list-group-item"><s>'.$tarea['titulo'].': '.$tarea['descripcion'].'</s><a href="borrarTarea/'.$tarea['id_tarea'].'"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></li>';
  }
  else {
  echo '<li class="list-group-item">'.$tarea['titulo'].': '.$tarea['descripcion'].'</s><a href="borrarTarea/'.$tarea['id_tarea'].'"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a><a href="tareaCompleta/'.$tarea['id_tarea'].'"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a></li>';
}
}
?> -->
<!--Incluyo otro template en el que tengo el "Molde" del footer"-->
{include file="footer.tpl"}
<!---->
