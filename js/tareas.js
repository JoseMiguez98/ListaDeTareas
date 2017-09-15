$( document ).ready(function() {
  "use strict";
  $.ajax({
    'url' : '/Proyectos/Web2/TemplateEngine-Practica4/tareas',
    'success':function show(data){
      for (var i = 0; i < 1000000000; i++) {
      }
      $('#tareas').html(data);
    }
    //setTimeout(show() ,3000);
  })
});
