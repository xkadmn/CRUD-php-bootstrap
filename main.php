<?php include 'templateheader.php';?>

<?php 
    include_once "modelo/conexionReg.php";
    $sentencia = $db -> query("select * from persona");
    $persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
// Verificar si la variable de sesión 'id_rol' está definida y obtener su valor
$id_rol = isset($_SESSION['id_rol']) ? $_SESSION['id_rol'] : null;

?>
 <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<div class="container ">     
    <div class="row">
        <div class="col-md-7">
            <div class="p-4">
             
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">edad</th>
                                <th scope="col">signo</th>
                                <th scope="col">descripcion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($persona as $dato){

                                
                            ?>
                            <tr>
                                <td scope="row"><?php echo $dato->idP; ?></td>
                                <td><?php echo $dato->nombreP; ?></td>
                                <td><?php echo $dato->edadP; ?></td>
                                <td><?php echo $dato->signoP; ?></td>
                                <?php if ($id_rol == 1) 
                                { ?>
                                <td><a class="text-success btn-editar" href="#" data-id="<?php echo $dato->idP; ?>"><i class="bi bi-trash"></i></a></td>
                                <td><a onclick="return confirm('Estas seguro de eliminar el registro?');" class="text-danger" href="vista/eliminar.php?idP=<?php echo $dato->idP; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <?php
                                    } else { 
                                ?>
                                        <td><button class="btn btn-secondary" disabled><i class="bi bi-pencil-square"></i></button></td>
                                        <td><button class="btn btn-secondary" disabled><i class="bi bi-trash"></i></button></td>
                                <?php 
                                    } 
                                ?>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
              
            </div>
        </div>   

        
        <div class="col-md-5">
        <div class="card">
                <div class="card-header">
                    Ingresar datos
                </div>
                <form class="p-4" method="POST" action="controlador/controlador_registrar.php">
                    <div class="mb-3">
                        <label class="form-label"> Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Edad: </label>
                        <input type="number" class="form-control" name="txtEdad" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Signo: </label>
                        <input type="text" class="form-control" name="txtSigno" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
   



            <!-- Modal para mostrar la información del otro PHP -->
        <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body" id="infoModalBody">
                        <!-- Aquí se cargará el contenido del otro PHP mediante AJAX -->
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">

            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
                    
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Error </strong>Complete todos los campos
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            
                };
            ?>

            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){                   
            ?>
            <div class="alert alert-success alert-dismisible fade show" role="alert">
                <strong>Registrado </strong>Se agregaron los datos.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                };
            ?>

            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){                   
            ?>
            <div class="alert alert-danger alert-dismisible fade show" role="alert">
                <strong>Error </strong>Vuelve a intentar
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                };
            ?>

            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){                   
            ?>
            <div class="alert alert-success alert-dismisible fade show" role="alert">
                <strong><i class="bi bi-person-fill-check"></i></strong> Se han cambiado los datos.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                };
            ?>

            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){                   
            ?>
            <div class="alert alert-danger alert-dismisible fade show" role="alert">
                <strong><i class="bi bi-person-fill-x"></i></strong> Se ha eliminado el registro.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                };
            ?>
        </div>
        </div>
    </div>
</div>
<!-- Agrega esto al final del archivo PHP que muestra el CRUD -->
<script>
  // Función para cargar el contenido del otro PHP en el modal
  function cargarContenidoModal(idRegistro) {
    $.ajax({
      type: "GET",
      url: "vista/editar.php?idP=" + idRegistro,
      success: function (data) {
        // Insertar el contenido del otro PHP en el cuerpo del modal
        $("#infoModalBody").html(data);
        // Mostrar el modal
        $("#infoModal").modal("show");
      },
      error: function (error) {
        console.log("Error al cargar el contenido del modal: " + error);
      },
    });
  }

  // Manejar el evento clic del botón para mostrar la información
  $(".btn-editar").click(function () {
    var idRegistro = $(this).data("id");
    cargarContenidoModal(idRegistro);
  });
</script>

<?php include 'templatefooter.php' ?>
