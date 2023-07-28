    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js" integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" type="" href="../stilo.css">

<body>

<!-- color de fondo blanco-gris #e9e0d6 -->
<div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
                
         <h2 class="card-header fw-bold text-center py-5">Registrate</h2>
            
             <form method="POST" action="../controlador/controlador_register.php">
                <div class="mb-4">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" name="email_reg">

                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="pass_reg">

                </div>
                <div class="mb-4">
                    <input type="checkbox" name="admin_Reg" class="form-check-input">
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



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

