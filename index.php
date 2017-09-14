<?php
include_once 'tareasDB.php';
define ('HOME', 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']).'/');

function tareaCompleta($params){
  finalizarTarea($params[0]);
  header('Location:'.HOME);
}

function borrarTarea($params){
  deleteTarea($params[0]);
  header('Location:'.HOME);
}
function agregarTarea(){
  $titulo = $_POST['titulo'];
  $descripcion = $_POST['descripcion'];
  $completado = isset($_POST['completado']) ? $_POST['completado'] : 0;
  insertTarea($titulo, $descripcion, $completado);
  //Redirigo la pagina al home, pongo la ruta completa por que el header() no es relativo;
  header('Location:'.HOME);
}

function home(){
  $tareas = getTareas();
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>To do app</title>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <h1>Lista de tareas</h1>
          <ul class="list-group">
            <?php
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
          ?>
        </ul>
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
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/tareas.js"></script>
</body>
</html>
<?php } ?>
