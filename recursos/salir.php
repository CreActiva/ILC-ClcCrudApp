<?php
session_start();//Reanudar la sesión
require('conexion.php');//Requerir datos de la conexión a la BBDD
unset($_SESSION);//Des-establecer todas las sesiones
session_destroy();//Destruir las sesiones  
mysqli_close($conexion);//Cerrar la conexión con la base de datos
header("Location: ../");//Redireccionamos a el index
die();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Cerrando sesión...</title>
</head>
<body>
</body>
</html>