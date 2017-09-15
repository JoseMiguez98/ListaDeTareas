
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
