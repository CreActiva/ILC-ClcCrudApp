<?php
include_once('conexion.php');
$sql= 'SELECT MAX(ID) AS ID FROM Usuarios_Clc';
$last = mysqli_query($con,$sql);$last = mysqli_fetch_assoc($last);
$last = $last['ID'];//último ID
$sql = 'SELECT `Certificado` FROM `Usuarios_Clc` WHERE ID ='.$last;
$uCerti = mysqli_query($con,$sql);$uCerti = mysqli_fetch_assoc($uCerti);
$uCerti = $uCerti['Certificado'];//último certificado

$certificado = $uCerti + 1;//nuevo certificado
$nombre = mysqli_real_escape_string($con,$_POST['nombre']);//extrayendo datos
$apellido = mysqli_real_escape_string($con,$_POST['apellido']);
$telefono = mysqli_real_escape_string($con,$_POST['telefono']);
$rol = mysqli_real_escape_string($con,$_POST['rol']);
$email = mysqli_real_escape_string($con,$_POST['email']);
$cohorte = mysqli_real_escape_string($con,$_POST['cohorte']);
$observacion = mysqli_real_escape_string($con,$_POST['observacion']);
if(($nombre || $apellido || $telefono || $certificado || $rol || $email || $cohorte) != (null || '')) {
$sql = 'SET NAMES `utf8`';
$query = mysqli_query($con,$sql);
$sql = 'INSERT INTO `Usuarios_Clc` (`Certificado`,`Nombre`,`Apellido`,
`Email`,`Telefono`, `Rol`,`Cohorte`,`Observacion`) VALUES
("'.$certificado.'","'.$nombre.'","'.$apellido.'","'.$email.'","'.$telefono.'","'.$rol.'","'.$cohorte.'","'.$observacion.'")';
$query = mysqli_query($con,$sql);
echo 'Usuario agregado correctamente';
} else{
   
}