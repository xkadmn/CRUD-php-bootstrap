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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">    
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-9SNzQvb0z0Wz47U9mJWQ6OrMdrAiCChS6EoV3ny8eZl4c4l7/M2k0q67ZpcM1ksj" crossorigin="anonymous"></script>