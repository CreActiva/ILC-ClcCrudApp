<?php
include_once('conexion.php');
$id = mysqli_real_escape_string($con,$_POST['id']);
$nombre = mysqli_real_escape_string($con,$_POST['nombre']);
$apellido = mysqli_real_escape_string($con,$_POST['apellido']);
$telefono = mysqli_real_escape_string($con,$_POST['telefono']);
$certificado = mysqli_real_escape_string($con,$_POST['certificado']);
$rol = mysqli_real_escape_string($con,$_POST['rol']);
$email = mysqli_real_escape_string($con,$_POST['email']);
$cohorte = mysqli_real_escape_string($con,$_POST['cohorte']);
$observacion = mysqli_real_escape_string($con,$_POST['observacion']);
if(($id || $nombre || $apellido || $telefono || $certificado || $rol || $email || $cohorte) != (null || '')) {
   $sql = 'UPDATE Usuarios_Clc SET `Nombre`="'.$nombre.'", `Apellido`="'.$apellido.'", `Telefono`
   ="'.$telefono.'", `Rol` ="'.$rol.'", `Email`="'.$email.'",`Cohorte`="'.$cohorte.'",
   `Observacion`="'.$observacion.'"  WHERE `ID`='.$id.'';
   $res = mysqli_query($con, $sql);
   echo 'Usuario editado correctamente';
} else{
   echo 'Faltan datos';
}