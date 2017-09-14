<!--Incluyo otro template en el que tengo el "Molde" del header"-->
{include file="header.tpl"}
<!---->
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <h1>Lista de tareas</h1>
    <ul class="list-group">
      <!--Inyecto en una lista cada una de las tareas obtenidas por parametro-->
      {foreach from=$tareas item=tarea}
      <li class="list-group-item">
        {if $tarea['completado']}
          <s>{$tarea['titulo']|truncate:6|upper}:{$tarea['descripcion']}</s>
        {else}
          {$tarea['titulo']}:{$tarea['descripcion']|truncate:6|upper}<a href="tareaCompleta/{$tarea['id_tarea']}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
        {/if}
        <a href="borrarTarea/{$tarea['id_tarea']}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
        {/foreach}
      </ul>
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
<form class='formTareas' action="agregarTarea" method="post">
  <div class="form-group">
    <label for="titulo">Titulo de la tarea</label>
    <input type="text" class="form-control" id="titulo" name="titulo">
  </div>
  <div class="form-group">
    <label for="descripcion">Descripción</label>
    <textarea id="descripcion" rows="8" cols="70" name='descripcion'></textarea>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox" name="completado" value="1"> Completada
    </label>
  </div>
  <button type="submit" class="btn btn-default">Crear</button>
</form>
</div>
</div>
<!--Incluyo otro template en el que tengo el "Molde" del footer"-->
{include file="footer.tpl"}
<!---->
