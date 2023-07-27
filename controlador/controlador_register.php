<?php 

$conexion = new mysqli("localhost","root","","login");
if(isset($_POST['btnRegistrar'])){
    if(
        strlen($_POST['email_reg']) >= 1 &&
        strlen($_POST['pass_reg']) >= 1
      ){
            $email = trim($_POST['email_reg']);
            $pass = trim($_POST['pass_reg']);
            $id_rol = 2;
            $consulta = "INSERT INTO login (email, pass, id_rol) VALUES ('$email', '$pass', $id_rol)";
            $resultado = mysqli_query($conexion, $consulta);
            if($resultado){
                ?>
                <?php
                header('Location:  ../login.php');
            }else{
                ?>
                <h3 class="error">Ocurrió un error: <?php echo mysqli_error($conexion); ?></h3>
                
                <?php
            }
            }else{
        ?>
        <h3 class="error">llena los campos</h3>
        <?php
    }

}

?>