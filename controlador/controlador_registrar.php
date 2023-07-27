<?php
    
    print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) ||
    empty($_POST["txtEdad"]) || empty($_POST["txtSigno"])){
        header("Location: ../main.php?mensaje=falta");
        exit();
    }

    include_once '../modelo/conexionReg.php';
    $nombre = $_POST['txtNombre'];
    $edad = $_POST['txtEdad'];
    $signo = $_POST['txtSigno'];

    $sentencia = $db->prepare("INSERT INTO persona(nombreP, edadP, signoP) VALUES (?,?,?);");
    $resultado = $sentencia->execute([$nombre,$edad,$signo]);

    if($resultado === TRUE){
        header('Location: ../main.php?mensaje=registrado');

    }else{
        header('Location: ../main.php?mensaje=error');
        exit();

    }
?>  