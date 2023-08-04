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
    $signosValidos = array("Aries", "Tauro", "Géminis", "Cáncer", "Leo", "Virgo", "Libra", "Escorpio", "Sagitario", "Capricornio", "Acuario", "Piscis");
    $signoLower = strtolower($signo);
    $signosValidosLower = array_map('strtolower', $signosValidos);

    if (!in_array($signoLower, $signosValidosLower)) {
        header('Location:  ../main.php?mensaje=error');
        exit();
    
    }else{
        $sentencia = $db->prepare("UPDATE persona SET nombreP = ? , edadP = ?, signoP = ? where idP = ?");
        $resultado = $sentencia->execute([$nombre, $edad, $signo, $codigo]);

        if($resultado === TRUE){
            header('Location:  ../main.php?mensaje=editado');
        } else{
            header('Location:  ../main.php?mensaje=error');
            exit();
        }

    }
?>