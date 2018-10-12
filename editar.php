<?php
session_start();
$rol = $_SESSION['rol'];
if($rol !== 'admin'){
   header('Location: recursos/salir.php');//usuario no logueado
} else{
   $usuario = $_SESSION['usuario'];
   $rol = $_SESSION['rol']; 
   $salir = '<a class="btn btn-pink text-light" href="recursos/salir.php" target="_self" >Cerrar sesión</a>';
   require('recursos/sesiones.php');
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="robots" content="noindex">
   <meta name="googlebot" content="noindex">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Inicio</title>
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
            <?php echo $salir; ?>
      </div>
   </nav>
   <div class="container">
      <div class="row mt-5">
         <div class="col-10"><h3>Editar Usuario</h3></div>
         <div class="col-2"><a href="index.php" class="btn btn-primary">Regresar</a></div>
         <div class="w-100"></div>
         <div class="col-12">
            <form id="editar">
               <div class="form-row">
                  <div class="col-md-4 mb-3">
                     <label for="nombre">Nombre</label>
                     <input type="text" class="form-control" id="nombre" placeholder="Nombre" value="" required maxlength="45">
                  </div>
                  <div class="col-md-4 mb-3">   
                     <label for="apellido">Apellido</label>
                     <input type="text" class="form-control" id="apellido" placeholder="Apellido" value="" required maxlength="45">
                  </div>
                  <div class="col-md-4 mb-3">
                     <label for="rol">Rol</label>
                     <input type="text" class="form-control" id="rol" placeholder="Rol" value="" required maxlength="50">
                  </div>
               </div>
               <div class="form-row">
                  <div class="col-md-4 mb-3">
                     <label for="telefono">Teléfono</label>
                     <input type="text" class="form-control" id="telefono" placeholder="Teléfono" value="" required maxlength="100">
                  </div>
                  <div class="col-md-8 mb-3">
                     <label for="email">Email</label>
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text" id="inputGroupPrepend">@</span>
                        </div>
                        <input type="email" class="form-control" id="email" placeholder="Email" required maxlength="100">
                     </div>
                  </div>
               </div>
               <div class="form-row">
                  <label for="cohorte">Cohorte</label>
                  <input type="text" class="form-control" id="cohorte" placeholder="Cohorte" required/>
               </div>
               <div class="form-row">
                  <label for="observacion">Observación</label>
                  <textarea type="text" class="form-control" id="observacion" placeholder="Observación" maxlength="200" required></textarea>
               </div>
               <div class="form-group">
                  <div class="form-check">
                     <input class="form-check-input" type="checkbox" id="gridCheck">
                     <label class="form-check-label" for="gridCheck">¿Deseea editar?</label>
                  </div>
               </div>
               <button type="submit" class="btn btn-primary">Editar</button>
            </form>
         </div>
      </div>
   </div>
</body>
<nav id="footer" class="navbar fixed-bottom navbar-light bg-primary">
   <div class="col-12 text-center">
      <div class="tiny-footer text-light p-2">
         © 2018 Copyright:<a class="text-light" href="http://ilcacademy.com"> ILC ACADEMY</a>
      </div>
   </div>
</nav>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/editar.js"></script>
</html>
<?php
}
