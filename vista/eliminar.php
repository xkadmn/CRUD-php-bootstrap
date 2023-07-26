<?php 
    if(!isset($_GET['idP'])){
        header('Location: ../main.php?mensaje=error');
        exit();
    }

    include '../modelo/conexionReg.php';
    $codigo = $_GET['idP'];

    $sentencia = $db->prepare("DELETE FROM persona where idP = ?;");
    $resultado = $sentencia->execute([$codigo]);

    if($resultado === TRUE){
        header('Location: ../main.php?mensaje=eliminado');

    }else{
        header('Location:  ../main.php?mensaje=error');
    }

?>