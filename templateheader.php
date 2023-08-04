<?php 
session_start();


if (!isset($_SESSION['email'])) {
    echo "Sin acceso";
    header("Location: login.php");
    exit;
}

$email = $_SESSION['email'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" type="" href="stilo1.css">


    <style>
    </style>
</head>


<body>
    <nav class=header1>
        <div class="container-fluid">
            <div class="row">
                <!-- Sección 1 con 60% de ancho -->
                <div class="col section1 section-60">
                    <a class="text-center text-white"> CRUD main</a>
                </div>

                <!-- Sección 2 con 15% de ancho -->
                <div class="col section1 section-15">
                   <a class="text-center text-white"> Mail logueado: <?php echo $email; ?></a>
                </div>

                <!-- Sección 3 con 15% de ancho -->
                <div class="col section1 section-15 ml-auto">
                
                    <a class="nav-link text-white  text-right" href="./modelo/cerrarsession.php"><i class="bi bi-x-circle-fill"></i></a>
                </div>
            </div>
        </div>
    </nav>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
</body>

</html>