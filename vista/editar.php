<?php
    if(!isset($_GET['idP'])){
        header('Location: ./main.php?mensaje=error');
        exit();
    }

    include_once '../modelo/conexionReg.php';
    $idP = $_GET['idP'];

    $sentencia = $db->prepare("select * from persona where idP = ?;");
    $sentencia->execute([$idP]);
    $persona = $sentencia->fetch(PDO::FETCH_OBJ);
?>

<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="controlador/controlador_editar.php">
                    <div class="mb-3">
                        <label class="form-label"> Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required value="<?php echo $persona->nombreP; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Edad: </label>
                        <input type="number" class="form-control" name="txtEdad" autofocus required value="<?php echo $persona->edadP; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Signo: </label>
                        <input type="text" class="form-control" name="txtSigno" autofocus required value="<?php echo $persona->signoP; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $persona->idP ?>">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>           
        </div>
    </div>
</div>

