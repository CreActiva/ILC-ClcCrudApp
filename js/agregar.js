(function($){
$('#myModal').modal('hide');
$('#editar').submit(function(e){
   e.preventDefault();
   var nombre = $('#nombre').val();
   var apellido = $('#apellido').val();
   var rol = $('#rol').val();
   var telefono = $('#telefono').val();
   var email = $('#email').val();
   var cohorte = $('#cohorte').val();
   var observacion = $('#observacion').val();
   var update = {'nombre' : nombre,'apellido': apellido,'rol': rol,'telefono': telefono,'email':email,'cohorte':cohorte,'observacion':observacion};
   if((nombre.trim() || apellido.trim() || rol.trim() || email.trim || cohorte.trim()) == ''){// NOT WORK
      var respuesta = 'Llene el formulario correctamente, sin espacios en blanco.';
      $('.modal-body').empty();
      $('.modal-body').append(respuesta);
      $('#myModal').modal('show');
   } else{
      $.ajax({
         url:'recursos/create.php',
         data:update,
         method:'POST',
         success: function(respuesta){
            $('.modal-body').empty();
            $('.modal-body').append(respuesta);
            $('#myModal').modal('show');
         },
         error: function(x,y,z){
            alert('Tipo de error: '+y);
         }
      });
   }
});
}(jQuery));