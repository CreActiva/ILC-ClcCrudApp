<?php
session_start();//iniciar sesion
error_reporting(0);//evitar noticias php
$_SESSION['update'] = $_POST['update'];
if(isset($_SESSION['usuario']) and $_SESSION['estado'] == 'Autenticado') {//comprobar sesion
   include_once('usuarios.php');
   die();
}else {
   include_once('login.php');//no logueado
   die();
};