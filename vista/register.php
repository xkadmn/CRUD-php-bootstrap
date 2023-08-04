    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js" ></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" type="" href="../stilo.css">

<body>

<div class="container mt-5">
    
            <!-- alerta -->
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
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
                    
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert" id="alerta">
                <strong>El Email ya existe ;  </strong> Intente con otro.
            </div>
            <?php
            
                };
            ?>

            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta1'){
                    
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert" id="alerta">
                <strong>Campos vacíos ;  </strong> Complete los campos.
            </div>
            <?php
            
                };
            ?>

            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta2'){
                    
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert" id="alerta">
                <strong>Campo incorrecto ;  </strong> Debe ingresar un mail válido.
            </div>
            <?php
            
                };
            ?>


    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
    
                
         <h2 class="card-header fw-bold text-center py-5">Registrate</h2>
            
             <form method="POST" action="../controlador/controlador_register.php">
                <div class="mb-4 form-floating">
                    <input type="email" class="form-control" name="email_reg">
                    <label for="email" class="form-label">Correo Electrónico</label>
                </div>

                <div class="mb-4 form-floating">
                    <input type="password" class="form-control" name="pass_reg">
                    <label for="password" class="form-label">Contraseña</label>
                </div>
                <div class="mb-4">
                    <input type="checkbox" name="admin_reg" class="form-check-input">
                    <label for="conectado" class="form-check-label">Administrador</label>
                </div>
                
                <div class="divRegistrar d-flex justify-content-center">
                    <input type="submit" class="btn btn-primary" name="btnRegistrar" value="Registrar"> 
                </div><br><br>
                
                <div class="justify-content-left">
                <a class="btn-volver" href="../login.php"><i class="bi bi-arrow-left-circle" style="font-size: 24px;"></i></a>
                </div>
            </form> 
    
</div></div></div></div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"  crossorigin="anonymous"></script>
</body>

