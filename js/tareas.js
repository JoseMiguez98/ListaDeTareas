$( document ).ready(function() {
  "use strict";

  function cargarTareas() {
    $.ajax("api/tareas")
    .done(function(tareas) {
      // console.log(tareas);
      $('li').remove();
      for (let key in tareas) {
        $('#listaTareas').append(crearTarea(tareas[key]));
      }
    })
    .fail(function() {
      $('#listaTareas').append('<li>Imposible cargar la lista de tareas</li>');
    });
  }

  function crearTarea(tarea){
    let element = '<li id="tarea' + tarea.id_tarea + '"class="list-group-item">'
    if(tarea.completado == 1)
    element += '<s>' + tarea.titulo + '</s>';
    else
    element += tarea.titulo;
    element += '<a href="borrarTarea/' + tarea.id_tarea + '"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>';
    element += '<a href="finalizarTarea/' + tarea.id_tarea + '"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>'
    element += '</li>';
    return element;
  }

  //Refresco la lista de tareas
  $('#refresh').click(function(e){
    e.preventDefault();
    cargarTareas();
  });
  cargarTareas();
});
