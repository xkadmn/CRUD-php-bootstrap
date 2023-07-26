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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Document</title>
</head>
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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-9SNzQvb0z0Wz47U9mJWQ6OrMdrAiCChS6EoV3ny8eZl4c4l7/M2k0q67ZpcM1ksj" crossorigin="anonymous"></script>