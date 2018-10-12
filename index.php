<?php
session_start();//iniciar sesion
error_reporting(E_ALL ^ E_NOTICE);//evitar noticias php
if(isset($_SESSION['usuario']) and $_SESSION['estado'] == 'Autenticado') {//comprobar sesion
	include_once('usuarios.php');
	die();
} else {
	include_once('login.php');//no logueado
	die();
};