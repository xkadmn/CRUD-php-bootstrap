<?php
   session_start();

$conexion = new mysqli("localhost", "root", "", "login");
if (isset($_POST['btnRegistrar'])) {
    if (strlen($_POST['email_reg']) >= 1 && strlen($_POST['pass_reg']) >= 1) {
        $email = $_POST['email_reg'];
        $pass = $_POST['pass_reg'];
        $id_rol = isset($_POST['admin_reg']) && $_POST['admin_reg'] ? 2 : 1;
        $consulta = "INSERT INTO login (email, pass, id_rol) VALUES ('$email', '$pass', '$id_rol')";
        $resultado = mysqli_query($conexion, $consulta);
        if ($resultado  === TRUE) {
            header('Location: ../login.php?mensaje=registrado');
           // $_SESSION['registro_exitoso'] = true;
        } else {
            $_SESSION['registro_error'] = true;
        }
        
        header('Location: ../login.php?');
        exit; 
    } else {
        ?>
        <h3 class="error">llena los campos</h3>
        <?php
    }
}
?>