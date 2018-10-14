(function ($) {
$('#agregar').click(function(){
   var agregar = window.location.href;
   agregar += 'agregar.php';
   location.replace(agregar);
})
$(document).ready(function() {
   $.ajax({
      url: 'recursos/query.php',
      dataType: 'JSON',
      method: 'GET',
      success: function (respuesta) {
         var flag;
         (respuesta.rol=='admin')? flag=true : flag=false;
         $.each(respuesta.data, function (i, value) {//crear contenido de tabla
            var fila = '<tr><td>'+ value.Certificado + '</td><td>' + value.Nombre + '</td><td>' + value.Apellido + '</td><td>' + value.Email + '</td><td>' + value.Telefono + '</td><td>' + value.Rol + '</td><td>' + value.Cohorte + '</td><td>'+value.Observacion+'</td>';
            fila += (flag)?'<td><a class="editar btn btn-pink text-light" id="'+i+'">Editar</a></td>':'';
            fila += '</tr>';
            $('tbody').append(fila);
         });
         var dt = $('#table').DataTable({//Organizador de tabla
            rowReorder: {
               selector: 'td:nth-child(2)'
            },
            responsive: true,
            "language": {
               "url": "languages/espanol.json"
            },
            "pageLength": 100
         });
         $('.busqueda').keyup(function() {//Condicionales de busqueda
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
         $('.editar').click(function(){
            var n = $(this).attr('id');
            var id = parseInt(n)+1;
            var nombre = respuesta.data[n]['Nombre'];
            var apellido = respuesta.data[n]['Apellido'];
            var certificado = respuesta.data[n]['Certificado'];
            var email = respuesta.data[n]['Email'];
            var telefono = respuesta.data[n]['Telefono'];
            var userRol = respuesta.data[n]['Rol'];
            var cohorte = respuesta.data[n]['Cohorte'];
            var obs = respuesta.data[n]['Observacion'];
            var observacion = (obs == undefined || obs == null)?'':obs;
            var update = {'arrayN':n,'id':id,'nombre':nombre,'apellido':apellido,
            'certificado':certificado,'email':email,'telefono':telefono,
            'userRol':userRol,'cohorte':cohorte,'observacion':observacion};
            var editar = window.location.href;//misma dirección
            editar += 'editar.php';
            editar += '?nombre='+nombre+'&apellido='+apellido;
            editar +='&certificado='+certificado+'&email='+email;
            editar +='&telefono='+telefono+'&userRol='+userRol;
            editar +='&cohorte='+cohorte+'&observacion='+observacion;
            editar += '&id='+id;
            location.replace(editar);
         });
      },
      error: function (x, y, z) {
         alert('Tiempo en sesión culmianda');
         var inicio = window.location.href;//misma dirección
         location.replace(inicio);
      }
   });
});
}(jQuery));