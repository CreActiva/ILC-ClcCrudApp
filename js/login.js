var mensaje = $("#mensaje");
mensaje.hide();
$("#acceso").submit(function(e){
	e.preventDefault();//Evitar que se envíe por defecto
	var formData = new FormData(document.getElementById("acceso"));//obtener datos del form
	$.ajax({
		url: "recursos/acceder.php",//lugar donde se envian datos
		type: "POST",//Definimos el tipo de método de envío
		dataType: "HTML",//Definir el tipo de datos que vamos a enviar y recibir
		data: formData,//Definir la información que vamos a enviar
		cache: false,//Deshabilitar el caché
		contentType: false,//No especifir el contentType
		processData: false,//No permitir que los datos pasen como un objeto
        success:function(echo){ //Comprobar si la respuesta no es vacía
            if (echo !== "") {
                mensaje.html(echo);//Si hay respuesta (error), mostrar el mensaje
                mensaje.slideDown(500);
            } else if(echo == '') {
                var same = window.location.href;//misma dirección
                location.replace(same);//redirigir
            }
        }
	});
});