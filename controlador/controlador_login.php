<?php

include('../modelo/conexion.php');

$usuario=$_POST['email'];
$pass=$_POST['pass'];
session_start();
$_SESSION['email']=$usuario;


$consulta = "SELECT * FROM login where email = '$usuario' and pass = '$pass' ";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_fetch_array($resultado);

if ($filas !== null && $filas !== ' ' && isset($filas['id_rol'])) {
   
    $_SESSION['id_rol'] = $filas['id_rol'];
    if($filas['id_rol'] == '2' || $filas['id_rol'] == '1' ){
        header ("location:../main.php");
    }else{
        header ("location:../login.php"); 
       $_SESSION['error_message'] = "Error de autenticación";
        ?>
        <h6>error</h6>
        <?php
    }
    /*if($filas['id_rol'] == '2'){
        header ("location:../main.php");
    }else if($filas['id_rol'] == '1'){
        header ("location:../admin.php");
    }else{
        header ("location:../login.php"); 
       $_SESSION['error_message'] = "Error de autenticación";
        ?>
        <h6>error</h6>
        <?php
    }*/
} else {
    header ("location:../login.php");  
    $_SESSION['error_message'] = "Error de autenticación";
}
mysqli_free_result($resultado);
mysqli_close($conexion);

?>