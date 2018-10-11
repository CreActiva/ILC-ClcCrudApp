<?php
require_once('conexion.php');//conectar con bd
$userPOST = $_POST["userAcceso"];//obtener datos
$passPOST = $_POST["passAcceso"];
$userPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $userPOST));//filtrar datos xss
$passPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $passPOST));
$maxCaracteresUsername = "40";//Definir longitud
$maxCaracteresPassword = "60";
if(strlen($userPOST) > $maxCaracteresUsername) {//comparando longitud de caracteres
	die('El nombre de usuario no puede superar los '.$maxCaracteresUsername.' caracteres');
}
else if(strlen($passPOST) > $maxCaracteresPassword) {//comparando longitud de caracteres
	die('La contraseña no puede superar los '.$maxCaracteresPassword.' caracteres');
} else {
   $userPOST = strtolower($userPOST);//colocar en minúscula
   $consulta = "SELECT username,email,password FROM usuarios WHERE username='".$userPOST."'";
   $resultado = mysqli_query($conexion, $consulta);//consulta
   $datos = mysqli_fetch_array($resultado);
   $userBD = $datos['username'];//guardando datos
   $passwordBD = $datos['password'];
   $emailBD = $datos['email'];
   $emailBD = strtolower($emailBD);
   if(($userBD == $userPOST xor $emailBD == $userPOST) and password_verify($passPOST,$passwordBD)){//no funciona entrar con email
       session_start();//conectado
       $_SESSION['usuario'] = $datos['username'];
       $_SESSION['estado'] = 'Autenticado';
   } else if ( ($userBD != $userPOST && $emailBD != $userPOST) || $userPOST == "" || $passPOST == "" || password_verify($passPOST,$passwordBD) !== 1 ) { //verificar si hay error
       die ('<script>$(".acceso").val("");</script>Los datos de acceso son incorrectos');
   } else { //verificar si hay error y ninguna de las anteriores cumple
       die('Error');
   }
   $conexion->close();
}