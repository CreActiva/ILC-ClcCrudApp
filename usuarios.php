<?php
session_start();//reanudar sesion
if(!isset($_SESSION['usuario']) and $_SESSION['estado'] != 'Autenticado') {
   header('Location: index.php');//usuario no logueado
} else {
   $usuario = $_SESSION['usuario'];
   $rol = $_SESSION['rol']; 
   $salir = '<a class="btn btn-pink text-light" href="recursos/salir.php" target="_self" >Cerrar sesión</a>';
   require('recursos/sesiones.php');
}
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Inicio</title>
   <meta name="robots" content="noindex">
   <meta name="googlebot" content="noindex">
   <link rel="stylesheet" href="css/bootstrap.css">
   <link rel="stylesheet" href="css/datatables.min.css">
   <link rel="stylesheet" href="css/usuarios.css">
</head>
<body>
   <nav id="header" class="navbar navbar-expand-lg navbar-dark bg-secondary">
      <div class="collapse navbar-collapse">
         <ul class="navbar-nav mr-auto col-sm-3 col-md-3">
            <li class="nav-item active">
               <h4 class="text-light text-capitalize">Hola,
                  <?php echo $usuario;?>
               </h4>
            </li>
         </ul>
         <form class="form-inline my-2 my-lg-0">
            <?php echo $salir; ?>
         </form>
      </div>
   </nav>
   <div class="container-fluid" id="content">
      <div class="row mt-5 d-flex  justify-content-center">
         <div class="col-sm-6">
            <div class="input-group mb-3">
            <label for="busqueda" class="mr-4"><h3 class="text-primary ">Usuarios</h3></label>
               <input id="busqueda" type="text" class="busqueda form-control" placeholder="Buscar" aria-label="Recipient's username" aria-describedby="button-addon2" maxlength="50">
            </div>
         </div>
         <?php 
         if($rol == 'admin'){
         echo
         '<div class="col-sm-3"><button class="btn btn-primary" id="agregar">+ Agregar nuevo usuario</button></div>';
         }
         ?>
      </div>
      <div id="mensaje" class="row">
         <div class="col-12 align-self-center">
            <h4 class="text-center text-secondary mt-5">Ingresar búsqueda</h4>
         </div>
      </div>
      <div class="row tablaContent mb-5">
         <div class="tablaDiv col-md-12 col-xs-8 mb-5">
            <table class="table table-striped" id="table">
               <thead>
                  <tr class="table-primary">
                     <th scope="col">Certificado</th>
                     <th scope="col">Nombre</th>
                     <th scope="col">Apellido</th>
                     <th scope="col">Email</th>
                     <th scope="col">Teléfono</th>
                     <th scope="col">Rol</th>
                     <th scope="col">Cohorte</th>
                     <th scope="col">Observación</th>
                     <?php ($rol == 'admin')? print '<th scope="col">Acción</th>': '';?>
               </thead>
               <tbody></tbody>
            </table>
         </div>
      </div>
   </div>
   <nav id="footer" class="navbar fixed-bottom navbar-light bg-primary">
      <div class="col-12 text-center">
         <div class="tiny-footer text-light p-2">
            © 2018 Copyright:<a class="text-light" href="http://ilcacademy.com"> ILC ACADEMY</a>
         </div>
      </div>
   </nav>
   <script src="js/jquery-3.3.1.min.js"></script>
   <script src="js/datatables.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/usuarios.js"></script>
</body>
</html>