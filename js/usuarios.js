(function ($) {
   $(document).ready(function() {
      $.ajax({
         url: 'recursos/query.php',
         dataType: 'JSON',
         method: 'GET',
         success: function (respuesta) {
            var flag;
            (respuesta.rol=='admin')? flag=true : flag=false;
            $.each(respuesta.data, function (i, value) {
               var fila = '<tr><td>'+ value.Certificado + '</td><td>' + value.Nombre + '</td><td>' + value.Apellido + '</td><td>' + value.Email + '</td><td>' + value.Telefono + '</td><td>' + value.Rol + '</td><td>' + value.Cohorte + '</td><td></td>';
               fila += (flag)?'<td><a href="editar.php" class="btn btn-pink text-light">Editar</a></td>':'';
               fila += '</tr>';
               $('tbody').append(fila);
            });
            var dt = $('#table').DataTable({
               rowReorder: {
                  selector: 'td:nth-child(2)'
               },
               responsive: true,
               "language": {
                  "url": "languages/espanol.json"
               },
               "pageLength": 100
            });
            $('.busqueda').keyup(function() {
               dt.search($(this).val()).draw();
               var caracteres = $('.busqueda').val().length;
               valor = $(this).val().trim();//elimina espacios en blanco
               if (valor == ''){
                  $('.tablaDiv').css({'display': 'none'});
                  $('#mensaje').css({'display': 'block'});
                  $('#footer').css({
                     'position': 'fixed',
                     'botton':'0'
                  });
               }
               else if (caracteres > 2) {
                  $('.tablaDiv').css({'display': 'block'});
                  $('#mensaje').css({'display': 'none'});
                  var min = 100; var max =455;
                  var largo = $('#content').height();
                  if(largo > min && largo < max){
                  $('#footer').css({
                     'position': 'fixed',
                     'botton':'0'
                  });
                  } else {  
                     $('#footer').css({'position':'relative','botton':'0','margin':'0 auto'});
                  }
               } else {
                  $('.tablaDiv').css({'display': 'none'});
                  $('#mensaje').css({'display': 'block'});
                  $('#footer').css({
                     'position': 'fixed',
                     'botton':'0'
                  });
               }
            });
         },
         error: function (x, y, z) {
            alert('Tipo de error: ' + y);
         }
      });
   });
}(jQuery));