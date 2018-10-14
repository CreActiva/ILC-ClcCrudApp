<?php
session_start();
$rol = $_SESSION['rol'];
if($rol !== 'admin' || !isset($_SESSION['usuario']) || $_SESSION['estado'] != 'Autenticado'){
   header('Location: recursos/salir.php');//usuario no logueado
} else{
   $usuario = $_SESSION['usuario'];
   $rol = $_SESSION['rol']; 
   $salir = '<a class="btn btn-pink text-light" href="recursos/salir.php" target="_self" >Cerrar sesión</a>';
   require('recursos/sesiones.php');
   $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[SERVER_NAME]".($_SERVER['SERVER_NAME'] == 'localhost')?'/clcCRUDapp':'';
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
         <div class="col-10">
            <h3>Agregar Usuario</h3>
         </div>
         <div class="col-2"><a href="<?php echo $actual_link?>" class="btn btn-primary w-100">Atras</a></div>
         <div class="w-100"></div>
         <div class="col-12">
            <form id="editar" action="">
               <div class="form-row">
                  <div class="col-md-4 mb-3">
                     <label for="nombre">Nombre</label>
                     <input type="text" class="form-control" id="nombre" placeholder="Nombre" required maxlength="45">
                  </div>
                  <div class="col-md-4 mb-3">
                     <label for="apellido">Apellido</label>
                     <input type="text" class="form-control" id="apellido" placeholder="Apellido" required maxlength="45">
                  </div>
                  <div class="col-md-4 mb-3">
                     <label for="rol">Rol</label>
                     <select id="rol" class="custom-select mb-3">
                        <option selected value="Clc">Clc</option>
                        <option value="Ecoach">Ecoach</option>
                     </select>
                  </div>
               </div>
               <div class="form-row">
                  <div class="col-md-4 mb-3">
                     <label for="telefono">Teléfono</label>
                     <input type="text" class="form-control" id="telefono" placeholder="Teléfono" required maxlength="100">
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
                  <input type="text" class="form-control" id="cohorte" placeholder="Cohorte" required />
               </div>
               <div class="form-row">
                  <label for="observacion">Observación</label>
                  <textarea type="text" class="form-control" id="observacion" placeholder="Observación" maxlength="200"></textarea>
               </div>
               <div class="form-group">
                  <div class="form-check">
                     <input class="form-check-input" type="checkbox" id="gridCheck" required>
                     <label class="form-check-label" for="gridCheck">Verifique antes de editar</label>
                  </div>
               </div>
               <button type="submit" class="btn btn-primary w-100" data-target="#myModal">Editar</button>
               <div id="myModal" class="modal" tabindex="-1" role="dialog">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title">Estado de edición</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                     </div>
                  </div>
               </div>
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
<script src="js/agregar.js"></script>
</html>
<?php
}
