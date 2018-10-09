<?php
//Iniciamos la sesión
session_start();
//Pedimos el archivo que controla la duración de las sesiones
require('conexion.php');
require('recursos/sesiones.php');
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Acceso</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
   <div class="container">
    <div class="row mt-5">
       <div class="col-4"></div>
        <div class="col-4 mt-5">
           <img src="image/Logo-ILC.png" class="rounded mx-auto d-block w-50" alt="Ilc Academy">
            <h2 class="text-light">Accede a tu cuenta</h2>
            <div class="formulario-acceso">
                <form method="POST" id="acceso" action="" accept-charset="utf-8">
                    <input type="text" name="userAcceso" class="acceso form-control" id="userAcceso" placeholder="Usuario" autocomplete="off" maxlength="20"><br>
                    <input type="password" name="passAcceso" class="acceso form-control" id="passAcceso" placeholder="Contraseña" autocomplete="off" maxlength="60" describedby="Help" >
                    <small id="Help" class="text-light">Cuidamos la privacidad de los usuarios.</small>
                    <div id="mensaje" class="text-light text-center border border-primary rounded p-1"></div>
                    <input type="submit" name="acceso" class="boton-principal btn btn-primary mt-2  w-100" value="Acceder">
                </form>
            </div>
        </div>
        <div class="col-4"></div>
    </div>
    </div>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/login.js"></script>
</body>
</html>