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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="" href="stilo.css">
    <title>CRUD</title>
    
</head>
<body>
<!-- color de fondo blanco-gris #e9e0d6 -->
<div class="container w-75%  mt-5 rounded shadow">
    <div class="row align-items-stretch loginVentana">
        <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">
        </div>
        <div class="col p-500 rounded-end" >
      
            <h2 class="fw-bold text-center py-5">Registrate</h2>
            
             <form method="post" action="controlador/controlador_login.php">
                <div class="mb-4">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" name="email_reg">

                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="pass_reg">

                </div>
                <div class="mb-4">
                    <input type="checkbox" name="conectado" class="form-check-input">
                    <label for="conectado" class="form-check-label">Mantenerme conectado</label>
                </div>

                <div class="divRegistrar">
                    <input type="submit" class="btn btn-primary btnIngresar" name="btnRegistrar" value="Registrar"> 

                </div>

                <div class="my-3">
                    <span><a href="#"> Registrate </a></span><br>
                    <span><a href="#"> Recuperar contraseña </a></span>
                </div>
            </form>

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
<?php if (isset($_SESSION['error_message'])) : ?>
    <script>
    window.addEventListener('DOMContentLoaded', function() {
        var myModal = new bootstrap.Modal(document.getElementById('myModal'));
        myModal.show();
    });
    </script>

    <!-- Modal -->
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
<?php 
    unset($_SESSION['error_message']);
endif;
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>