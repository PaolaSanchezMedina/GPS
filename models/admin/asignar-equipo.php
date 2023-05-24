<?php
session_start();
if (empty($_SESSION["id"])) {
    header("location: ../login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Hoja de estilos css-->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!--Icono de la página-->
    <link rel="shortcut icon" href="../../assets/img/logo.png" type="image/x-icon">
    <!--Bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!--Font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Script para obtener fecha y hora actual-->
    <script src="../../assets/js/fecha-hora.js"></script>
    <!--Data table y jQuery-->
    <script type="text/javascript" src="../../assets/js/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="../../assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../../assets/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="../../assets/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="../../assets/js/responsive.bootstrap5.min.js"></script>
    <!--Data table y jQuery-->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="../../assets/css/responsive.bootstrap5.min.css">
    <title>SiCEI</title>
</head>

<body>
    <!--ENCABEZADO DE PÁGINA-->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand text-light fs-2 fw-semibold ms-3" href="#">
                <img src="../../assets/img/sicei-logo.png" alt="Logo" width="130" height="50" class="d-inline-block align-text-bottom">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-current="page" href=../admin/usuarios.php>Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-current="page" href=../admin/equipos-admin.php>Equipos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-current="page" href=../admin/asignar-equipo.php>Asignar equipos</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Catálogos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../admin/localidades.php">Localidades</a></li>
                            <li><a class="dropdown-item" href="../admin/tipos-equipo.php">Tipos de equipos</a></li>
                            <li><a class="dropdown-item" href="../admin/marcas.php">Marcas</a></li>
                            <li><a class="dropdown-item" href="../admin/colaboradores.php">Colaboradores</a></li>
                            <li><a class="dropdown-item" href="../admin/proveedores.php">Proveedores</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <a class="btn border-white text-light rounded-4 fw-semibold me-3 mt-2" href="../../database/controlador-cerrar-sesion.php">Cerrar sesión</a>
        </div>
    </nav>
    <!--CUERPO DE PÁGINA-->
    <div class="container mt-5">
        <div class="d-flex justify-content-between text-light">
            <h2>Asignar equipo</h2>
            <button type="button" class="btn btn-light text-primary fw-semibold" data-bs-toggle="modal" data-bs-target="#modal_asignar">Asignar equipo</button>
        </div>
        <!--Tabla-->
        <div class="row">
            <div class="col">
                <div class="tabla mt-2">
                    <table id="tablaPrestamos" class="table table-striped dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">Id préstamo</th>
                                <th scope="col">No. Nomina</th>
                                <th scope="col">Equipo</th>
                                <th scope="col">Fecha entrega</th>
                                <th scope="col">Observaciones</th>
                                <th scope="col">Entrega</th>
                                <th scope="col">Identificador</th>
                                <th scope="col">Dominio</th>
                                <th scope="col">Portable</th>
                                <th scope="col">Estatus</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--Pantalla modal para asignar un equipo-->
    <div class="modal fade modal-xl mt-5" id="modal_asignar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Asignar un equipo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="asignarEquipoForm" action="" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <label for="" class="fw-semibold">Número de nomina</label>
                                <input type="text" class="form-control" aria-label="nomina" id="inputNomina" name="inputNomina">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Equipo</label>
                                <select class="form-control" aria-label="equipo" id="inputEquipo" name="inputEquipo">
                                    <?php
                                    include('../../database/conexion.php');
                                    $sql = "SELECT * FROM equipo";
                                    $resultado = mysqli_query($con, $sql);
                                    if (mysqli_num_rows($resultado) > 0) {
                                        while ($row = mysqli_fetch_assoc($resultado)) {
                                            $idEquipo = $row["id_equipo"];
                                            $descripcionEquipo = $row["descripcion_equipo"];
                                            echo "<option value=\"$idEquipo\">$descripcionEquipo</option>";
                                        }
                                    } else {
                                        echo 'No se encontraron resultados.';
                                    }
                                    mysqli_free_result($resultado);
                                    mysqli_close($con);
                                    ?>
                                </select>
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Fecha entrega</label>
                                <input type="date" class="form-control" aria-label="fecha" id="inputFecha" name="inputFecha">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="" class="fw-semibold">Observaciones</label>
                                <input type="text" class="form-control" aria-label="observaciones" id="inputObservaciones" name="inputObservaciones">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Usuario que entrega</label>
                                <select class="form-select" aria-label="Default select example" name="inputEntrega" id="inputEntrega">
                                    <option value="Administrador">Administrador</option>
                                    <option value="Supervisor">Supervisor</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Identificador</label>
                                <input type="text" class="form-control" aria-label="identificador" id="inputIdentificador" name="inputIdentificador">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="" class="fw-semibold">Dominio</label>
                                <input type="text" class="form-control" aria-label="dominio" name="inputDominio" id="inputDominio">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Portable</label>
                                <select class="form-select" aria-label="Default select example" name="inputPortable" id="inputPortable">
                                    <option value="Portable">Sí</option>
                                    <option value="No portable">No</option>
                                    <option value="No aplica">No aplica</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Estatus</label>
                                <select class="form-select" aria-label="Default select example" name="inputEstatus" id="inputEstatus">
                                    <option value="Activo">Activo</option>
                                    <option value="Terminado">Terminado</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--PIE DE PÁGINA-->
    <footer class="">
        <div class="d-flex justify-content-between mt-2">
            <p id="fecha-hora" class="ms-5"></p>
            <p>&copy; SiCEI 2023</p>
        </div>
    </footer>
    <!--========================================SCRIPT PARA EL CRUD========================================-->
    <script type="text/javascript">
        //Mostrar prestamos
        $(document).ready(function() {
            $('#tablaPrestamos').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-MX.json',
                },
                //Esta función se llama cada que se va a crear una fila nueva con datatables
                "fnCreatedRow": function(nRow, aData, iDataIndex) {
                    $(nRow).attr('id_prestamo', aData[0]);
                },
                'serverSide': 'true', //Los datos se procesan del lado del servidor
                'processing': 'true', //Muestra un indicador de carga mientras se procesan los datos
                'paging': 'true', //Habilita la paginación en la tabla.
                'order': [], //No ordena inicialmente los datos de la tabla.
                'ajax': { //Especifica la URL de la petición AJAX para recuperar los datos de la tabla
                    'url': '../../database/crud-prestamo/mostrar-prestamo.php',
                    'type': 'post',
                },
                "aoColumnDefs": [{ //Define opciones específicas para columnas individuales de la tabla
                    "bSortable": false,
                    //"aTargets": [9] //Es la columna de opciones
                }, ]
            })
        });
        $("#modal_asignar").on("show.bs.modal", function(event) {
            // Restablecer los valores de los campos de entrada
            $("#inputNomina").val("");
            $("#inputEquipo").val("");
            $("#inputFecha").val("");
            $("#inputObservaciones").val("");
            $("#inputEntrega").val("Administrador");
            $("#inputIdentificador").val("");
            $("#inputDominio").val("");
            $("#inputPortable").val("Portable");
            $("#inputEstatus").val("Activo");
        });
        //==========Asignar equipo==========
        $(document).on('submit', '#asignarEquipoForm', function(event) { //Establece un controlador de eventos en el formulario para el evento submit
            event.preventDefault();
            //Se obtienen los valores de los campos
            var numNomina_colaborador = $('#inputNomina').val();
            var id_equipo = $('#inputEquipo').val();
            var fechaEntrega_prestamo = $('#inputFecha').val();
            var observaciones_prestamo = $('#inputObservaciones').val();
            console.log(observaciones_prestamo);
            var usuarioEntrega_prestamo = $('#inputEntrega').val();
            var nomEquipo_prestamo = $('#inputIdentificador').val();
            var dominio_prestamo = $('#inputDominio').val();
            var portable_prestamo = $('#inputPortable').val();
            var status_prestamo = $('#inputEstatus').val();
            //Verifica que todos los campos esten llenos
            if (numNomina_colaborador != '' && id_equipo != '' && fechaEntrega_prestamo != '' && observaciones_prestamo != '' && usuarioEntrega_prestamo != '' && nomEquipo_prestamo != '' && dominio_prestamo != '' && portable_prestamo != '' && status_prestamo != '') {
                $.ajax({ //Petición ajax para agregar
                    url: "../../database/crud-prestamo/asignar-prestamo.php",
                    data: {
                        numNomina_colaborador: numNomina_colaborador,
                        id_equipo: id_equipo,
                        fechaEntrega_prestamo: fechaEntrega_prestamo,
                        observaciones_prestamo: observaciones_prestamo,
                        usuarioEntrega_prestamo: usuarioEntrega_prestamo,
                        nomEquipo_prestamo: nomEquipo_prestamo,
                        dominio_prestamo: dominio_prestamo,
                        portable_prestamo: portable_prestamo,
                        status_prestamo: status_prestamo
                    },
                    type: 'post',
                    success: function(data) { //Vuelve a dibujar la tabla y ocultar el modal
                        var json = JSON.parse(data);
                        status = json.status;
                        if (status == 'success') {
                            table = $('#tablaPrestamos').DataTable();
                            table.draw();
                            $('#modal_asignar').modal('hide');
                        }
                    }
                })
            } else {
                alert("Favor de llenar todos los campos")
            }
        });
    </script>

</body>

</html>