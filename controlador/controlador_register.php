<?php
   session_start();

$conexion = new mysqli("localhost", "root", "", "login");
$email = $_POST['email_reg'];
$pass = $_POST['pass_reg'];
$id_rol = isset($_POST['admin_reg']) && $_POST['admin_reg'] ? 2 : 1;
if (isset($_POST['btnRegistrar'])) {
    if (strlen($_POST['email_reg']) >= 1 && strlen($_POST['pass_reg']) >= 1) {

      

        $sqlMailExistente = "SELECT * FROM login WHERE email = '$email'";
        $result = mysqli_query($conexion, $sqlMailExistente);

        if (mysqli_num_rows($result) > 0) {
            // El correo electrónico ya está registrado, muestra un mensaje de error al usuario
            header('Location: ../vista/register.php?mensaje=falta');
            mysqli_close($conexion);
        } else {
         
            $consulta = "INSERT INTO login (email, pass, id_rol) VALUES ('$email', '$pass', '$id_rol')";
            $resultado = mysqli_query($conexion, $consulta);
          if ($resultado === TRUE) {
                // La inserción fue exitosa, establecer el mensaje de éxito en la variable de sesión
                $_SESSION['registro_exitoso'] = true;
            } else {
                // Hubo un error en la inserción, establecer el mensaje de error en la variable de sesión
                $_SESSION['registro_error'] = true;
            }
            header('Location: ../login.php?');
            exit; 

        }


    } else {
        ?>
        <h3 class="error">llena los campos</h3>
        <?php
    }
}
?>