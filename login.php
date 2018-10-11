<?php
session_start();//Iniciamos la sesión
require_once('recursos/conexion.php');//requerir conexión y sesiones
require_once('recursos/sesiones.php');
?>
<!doctype html>
<html lang="es">
<head>
   <meta charset="utf-8">
   <title>Acceso</title>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="css/bootstrap.css">
   <link rel="stylesheet" href="css/login.css">
</head>
<body>
   <div class="container">
      <div class="row h-100 d-flex justify-content-center align-content-center">
         <div class="col-lg-4 col-md-8 col-sm-12 align-self-center">
            <img src="image/Logo-ILC.png" class="rounded mx-auto d-block w-50" alt="Ilc Academy">
            <h2 class="text-light mb-2">Accede a tu cuenta</h2>
            <div class="formulario-acceso">
               <form method="POST" id="acceso" accept-charset="utf-8">
                  <input type="text" name="userAcceso" class="acceso form-control" id="userAcceso" placeholder="Usuario" autocomplete="off" maxlength="40"><br>
                  <input type="password" name="passAcceso" class="acceso form-control" id="passAcceso" placeholder="Contraseña" autocomplete="off" maxlength="60" describedby="Help">
                  <small id="Help" class="text-light">Cuidamos la privacidad de los usuarios.</small>
                  <div id="mensaje" class="text-light text-center border border-primary rounded p-1"></div>
                  <input type="submit" name="acceso" class="boton-principal btn btn-primary mt-2  w-100" value="Acceder">
               </form>
            </div>
         </div>
      </div>
   </div>
   <script src="js/jquery-3.3.1.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/login.js"></script>
</body>
</html>