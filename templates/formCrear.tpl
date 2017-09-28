{include file="header.tpl"}
<form class='formTareas' action="guardarTarea" method="post">
  <div class="form-group">
    <!-- Si viene seteada la variable error entonces lo muestro-->
      {if isset($error)}
      <div class="alert alert-danger" role="alert">{{$error}}</div>
      {/if}
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
{include file="footer.tpl"}
