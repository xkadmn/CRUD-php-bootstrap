<?php 
    
    print_r ($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: ../main.php?mensaje=error');
    }

    include '../modelo/conexionReg.php';
    $codigo = $_POST['codigo'];
    $nombre = $_POST['txtNombre'];
    $edad = $_POST['txtEdad'];
    $signo = $_POST['txtSigno'];

    $sentencia = $db->prepare("UPDATE persona SET nombreP = ? , edadP = ?, signoP = ? where idP = ?");
    $resultado = $sentencia->execute([$nombre, $edad, $signo, $codigo]);

    if($resultado === TRUE){
        header('Location:  ../main.php?mensaje=editado');
    } else{
        header('Location:  ../main.php?mensaje=error');
        exit();
    }


?>