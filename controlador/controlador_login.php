<?php

include('../modelo/conexion.php');

$usuario = $_POST['email'];
$pass = $_POST['pass'];
session_start();
$_SESSION['email'] = $usuario;

$consulta = "SELECT * FROM login where email = '$usuario'";
$resultado = mysqli_query($conexion, $consulta);

if ($resultado && mysqli_num_rows($resultado) === 1) {
    // Obtiene los datos del usuario desde la base de datos
    $filas = mysqli_fetch_assoc($resultado);
    if ($filas !== null && $filas !== ' ' && isset($filas['id_rol'])) {
        // Verificar que la contraseña coincida con el hash almacenado en la base de datos
        if (password_verify($pass, $filas['pass'])) {
            $_SESSION['id_rol'] = $filas['id_rol'];
            if ($filas['id_rol'] == '2' || $filas['id_rol'] == '1') {
                header("location:../main.php");
            } else {
                header("location:../login.php");
                $_SESSION['error_message'] = "Error de autenticación ";
            }
        } else {
            header("location:../login.php");
            $_SESSION['error_message'] = "Error de autenticación ";
        }
    } else {
        header("location:../login.php");
        $_SESSION['error_message'] = "Error de autenticación: Contraseña incorrecta";
    }
} else {
    header("location:../login.php");
    $_SESSION['error_message'] = "Error de autenticación: Mail incorrecto";
}

mysqli_free_result($resultado);
mysqli_close($conexion);

?>
