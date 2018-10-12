(function($){
$(document).ready(function(){
   $('#editar').submit(function(e){
      var nombre = $('#nombre').val();
      var apellido = $('#apellido').val();
      var rol = $('#rol').val();
      var telefono = $('#telefono').val();
      var email = $('#email').val();
      var cohorte = $('#cohorte').val();
      var observacion = $('#observacion').val();
      var update = {'nombre' : nombre,'apellido': apellido,'rol': rol,'telefono': telefono,'email':email,'cohorte':cohorte,'observacion':observacion};
      $.ajax({
         url:'recursos/actualizar.php',
         dataType:'JSON',
         data:update,
         method:'POST',
         success: function(){
         },
         error: function(){
            
         }
      });
   });
});  
}(jQuery));