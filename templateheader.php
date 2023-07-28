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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">    
    <link rel="stylesheet" type="" href="stilo.css">
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col py-3">
                <h5 class="text-center"> CRUD main</h5>
            </div>
            <div class="col d-flex justify-content-end align-items-center">
                <?php echo $email; ?>
                <a class="nav-link" href="./modelo/cerrarsession.php">cerrar</a>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"  crossorigin="anonymous"></script>
  