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
<link rel="stylesheet" type="" href="stilo1.css">
<div class="container contGeneral ">     
    <div class="row">
        <div class="col-md-7 contTabla">
            <div class="p-4">
             
                    <table class="table">
                        <thead>
                            <tr>
                                <!--<th scope="col" class="ocultar-columna"></th>-->
                                <th scope="col">Nombre</th>
                                <th scope="col">edad</th>
                                <th scope="col">signo</th>
                                <th scope="col">editar</th>                 
                                <th scope="col" unset>borrar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($persona as $dato){

                                
                            ?>
                            <tr>
                                <!--<td scope="row" class="ocultar-columna"><?php echo $dato->idP; ?> </td>-->
                                <td><?php echo $dato->nombreP; ?></td>
                                <td><?php echo $dato->edadP; ?></td>
                                <td><?php echo $dato->signoP; ?></td>
                                <?php if ($id_rol == 1) 
                                { ?>
                               
                                <td><a class="text-success btn-editar" href="#" data-id="<?php echo $dato->idP; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a onclick="return confirm('Estas seguro de eliminar el registro?');" class="text-danger" href="vista/eliminar.php?idP=<?php echo $dato->idP; ?>"><i class="bi bi-trash"></i></a></td>
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

        
        <div class="col-md-5 contRegistronuevo">
        <div class="card">
                <div class="card-header">
                    Ingresar Nuevo Registro
                </div>
                <form class="p-4" method="POST" action="controlador/controlador_registrar.php">
                    <div class="mb-3">
                        <label class="form-label"> Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required>
                        <div id="edadError" class="text-danger"></div> <!-- Mensaje de error -->
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Edad: </label>
                        <input type="number" class="form-control" name="txtEdad" autofocus required>
                        <div id="edadError" class="text-danger"></div> <!-- Mensaje de error -->
                    </div>
                 
                    <div class="mb-3">
                        <label class="form-label"> Signo: </label>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Selecciona un signo
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1"> 
                                <li><a class="dropdown-item" href="#" onclick="seleccionarSigno('Aries');">Aries</a></li>
                                <li><a class="dropdown-item" href="#" onclick="seleccionarSigno('Tauro');">Tauro</a></li>
                                <li><a class="dropdown-item" href="#" onclick="seleccionarSigno('Géminis');">Géminis</a></li>
                                <li><a class="dropdown-item" href="#" onclick="seleccionarSigno('Cáncer');">Cáncer</a></li>
                                <li><a class="dropdown-item" href="#" onclick="seleccionarSigno('Leo');">Leo</a></li>
                                <li><a class="dropdown-item" href="#" onclick="seleccionarSigno('Virgo');">Virgo</a></li>
                                <li><a class="dropdown-item" href="#" onclick="seleccionarSigno('Libra');">Libra</a></li>
                                <li><a class="dropdown-item" href="#" onclick="seleccionarSigno('Escorpio');">Escorpio</a></li>
                                <li><a class="dropdown-item" href="#" onclick="seleccionarSigno('Sagitario');">Sagitario</a></li>
                                <li><a class="dropdown-item" href="#" onclick="seleccionarSigno('Capricornio');">Capricornio</a></li>
                                <li><a class="dropdown-item" href="#" onclick="seleccionarSigno('Acuario');">Acuario</a></li>
                                <li><a class="dropdown-item" href="#" onclick="seleccionarSigno('Piscis');">Piscis</a></li>
                            </ul>
                            <input type="hidden" id="txtSigno" name="txtSigno" value="">
                        </div>
                    </div>

                    
                    <script>
                        function seleccionarSigno(signo) {
                            document.getElementById('txtSigno').value = signo;
                            document.querySelector('.btn-secondary').textContent = signo;
                        }
                    </script>

                    
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar" onclick="return validarCampos();">
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
        <div class="col-md">
        <script>    
            window.addEventListener('DOMContentLoaded', function () { // Mostrar la alerta cuando la página se haya cargado
                var alerta = document.getElementById('alerta');
                alerta.style.display = 'block';  
                setTimeout(function () { // Ocultar la alerta después de 1 segundo
                    alerta.style.display = 'none';
                }, 2000);
             });
        </script>
            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
                    
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert"id="alerta">
                <strong>Error </strong>Complete todos los campos.
            </div>
            <?php
            
                };
            ?>

            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){                   
            ?>
            <div class="alert alert-success alert-dismisible fade show" role="alert" id="alerta">
                <strong>Registrado </strong>Se agregaron los datos.
            </div>
            <?php
                };
            ?>

            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){                   
            ?>
            <div class="alert alert-danger alert-dismisible fade show" role="alert" id="alerta">
                <strong>Error </strong>Vuelve a intentar
            </div>
            <?php
                };
            ?>

            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){                   
            ?>
            <div class="alert alert-success alert-dismisible fade show" role="alert" id="alerta">
                <strong><i class="bi bi-person-fill-check"></i></strong> Datos editados con exito.
            </div>
            <?php
                };
            ?>

            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){                   
            ?>
            <div class="alert alert-danger alert-dismisible fade show" role="alert" id="alerta">
                <strong><i class="bi bi-person-fill-x"></i></strong> Se ha eliminado el registro.
            </div>
            <?php
                };
            ?>

            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'nombreinvalid'){                   
            ?>
            <div class="alert alert-danger alert-dismisible fade show" role="alert" id="alerta">
                <strong><i class="bi bi-person-fill-x"></i></strong> Nombre incorrecto.
            </div>
            <?php
                };
            ?>

            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'edadinvalid'){                   
            ?>
            <div class="alert alert-danger alert-dismisible fade show" role="alert" id="alerta">
                <strong><i class="bi bi-person-fill-x"></i></strong> La edad debe ser entre 0 y 99 años.
            </div>
            <?php
                };
            ?>

            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'signoinvalid'){                   
            ?>
            <div class="alert alert-danger alert-dismisible fade show" role="alert" id="alerta">
                <strong><i class="bi bi-person-fill-x"></i></strong> Ingrese un signo zodiacal.
            </div>
            <?php
                };
            ?>
        </div>
        </div>
    </div>
</div>


<!-- esto al final -->
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"  crossorigin="anonymous"></script>

<?php include 'templatefooter.php' ?>
