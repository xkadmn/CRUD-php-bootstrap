<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js" crossorigin="anonymous"></script> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" type="" href="stilo.css">
    <title>CRUD</title>
    
</head>
<body>
     <!-- alerta registro exitoso -->  

     <script>
    // Mostrar la alerta cuando la página se haya cargado
    window.addEventListener('DOMContentLoaded', function () {
        var alerta = document.getElementById('alerta');
        alerta.style.display = 'block';

        // Ocultar la alerta después de 1 segundo
        setTimeout(function () {
        alerta.style.display = 'none';
        }, 2000);
    });
    </script>

    
     <?php
      if (isset($_SESSION['registro_exitoso']) && $_SESSION['registro_exitoso']) {
        ?>  <div class="alert alert-success alert-dismisible fade show" role="alert" id="alerta">
                <strong>Registrado </strong>Se agregaron los datos.
            </div>
        <?php
        unset($_SESSION['registro_exitoso']); // Limpiar la variable de sesión
     }

     // Verificar si hubo un error en el registro
     if (isset($_SESSION['registro_error']) && $_SESSION['registro_error']) {
        ?>  <div class="alert alert-danger alert-dismisible fade show" role="alert" id="alerta">
        <strong>Error </strong>Hubo un problema con el registro.
            </div>
        <?php
         unset($_SESSION['registro_error']); // Limpiar la variable de sesión
     }
     ?>
             


<!-- color de fondo blanco-gris #e9e0d6 -->
<div class="container w-75%  mt-5 rounded shadow">
    <div class="row align-items-stretch loginVentana">
        <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">
        </div>
        <div class="col p-500 rounded-end" >
              
                
       
   
            <h2 class="fw-bold text-center py-5">Bienvenido</h2>
            
             <form method="post" action="controlador/controlador_login.php">
                <div class="mb-4">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" name="email">

                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="pass">

                </div>

                <div class="divIngresar">
                    <input type="submit" class="btn btn-primary btnIngresar" name="btnIngresar" value="iniciar"> 

                </div>
               
            </form>
                <div class="my-3 d-flex justify-content-center">
                    <a href="vista/register.php"><button class="btn btn-outline-secondary me-2 btn-register" type="button" value="">Registrate</button></a>
                    <button class="btn btn-outline-secondary" type="button">Recuperar contraseña</button>
                </div>
                
            <!--- LOGIN CON REDES SOCIALES--->
            <div class="container w-100 my-5">
                <div class="row">
                    <div class="col">
                        <button class="btn btn-outline-primary w-100 my-1">
                            <div class="row align-items-center">
                                <div class="col-2">
                                     <img src="img/facebook.png" width="32" alt="">
                                </div>
                                <div class="col-10 text-center">
                                     Facebook
                                </div>
                            </div>                      
                        </button>
                    </div>

                    <div class="col">
                        <button class="btn btn-outline-danger w-100 my-1">
                            <div class="row align-items-center">
                                <div class="col-2">
                                     <img src="img/gmail.png" width="32" alt="">
                                </div>
                                <div class="col-10 text-center">
                                     Gmail
                                </div>
                            </div>                      
                        </button>
                    </div>                   
                </div>
            </div>

        </div>
    

      
 <!-- modal error -->   
     <script>
    window.addEventListener('DOMContentLoaded', function() {
        var myModal = new bootstrap.Modal(document.getElementById('myModal'));
        myModal.show();
    });
    </script>
    <?php if (isset($_SESSION['error_message'])) { ?>
        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mensaje de error</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><?php echo $_SESSION['error_message']; ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
        </div>
    <?php }; ?>
    <?php if (isset($_SESSION['error_message'])) : ?>

        

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

  
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"  crossorigin="anonymous"></script>

</body>

</html>



<?php 
    unset($_SESSION['error_message']);
endif;
?>