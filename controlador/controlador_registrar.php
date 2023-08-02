<?php

if (empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtEdad"]) || empty($_POST["txtSigno"])) {
    header("Location: ../main.php?mensaje=falta");
    exit();
}

include_once '../modelo/conexionReg.php';
$nombre = $_POST['txtNombre'];
$edad = $_POST['txtEdad'];
$signo = $_POST['txtSigno'];


// Validar que el nombre no esté en blanco o solo contenga espacios
if (trim($nombre) === '') {
    header('Location: ../main.php?mensaje=nombreinvalid');
    exit();
}

// Validar que el nombre solo contenga letras y espacios
if (!preg_match("/^[a-zA-Z ]+$/", $nombre)) {
    header('Location: ../main.php?mensaje=nombreinvalid');
    exit();
}

// Validar que la edad sea un número entre 0 y 99
if (!is_numeric($edad) || $edad < 0 || $edad > 99) {
    header('Location: ../main.php?mensaje=edadinvalid');
    exit();
}


// Validar que el signo sea uno de los signos zodiacales válidos
$signosValidos = array("Aries", "Tauro", "Géminis", "Cáncer", "Leo", "Virgo", "Libra", "Escorpio", "Sagitario", "Capricornio", "Acuario", "Piscis");
if (!in_array($signo, $signosValidos)) {
    header('Location: ../main.php?mensaje=signoinvalid');
    exit();
}

$sentencia = $db->prepare("INSERT INTO persona(nombreP, edadP, signoP) VALUES (?,?,?);");
$resultado = $sentencia->execute([$nombre, $edad, $signo]);

if ($resultado === TRUE) {
    header('Location: ../main.php?mensaje=registrado');
} else {
    header('Location: ../main.php?mensaje=error');
    exit();
}
?>
