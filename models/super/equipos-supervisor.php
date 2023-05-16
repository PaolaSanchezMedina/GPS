<?php
session_start();
if (empty($_SESSION["id"])) {
    header("location: ../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

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
                        <a class="nav-link text-light" aria-current="page" href="../super/usuarios-supervisor.php">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-current="page" href="../super/equipos-supervisor.php">Equipos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-current="page" href="../super/asignar-equipos-supervisor.php">Asignar equipos</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Catálogos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../super/localidades-supervisor.php">Localidades</a></li>
                            <li><a class="dropdown-item" href="../super/tipos-equipo-supervisor.php">Tipos de equipos</a></li>
                            <li><a class="dropdown-item" href="../super/marcas-supervisor.php">Marcas</a></li>
                            <li><a class="dropdown-item" href="../super/colaboradores-supervisor.php">Colaboradores</a></li>
                            <li><a class="dropdown-item" href="../super/proveedores-supervisor.php">Proveedores</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-current="page" href=../super/prestamos-supervisor.php>Solicitar préstamo</a>
                    </li>
                </ul>
            </div>
            <a class="btn border-white text-light rounded-4 fw-semibold me-3 mt-2" href="../../database/controlador-cerrar-sesion.php">Cerrar sesión</a>
        </div>
    </nav>
    <!--CUERPO DE PÁGINA-->
    <div class="container mt-5">
        <div class="d-flex justify-content-between text-light">
            <h2>Equipos</h2>
            <button type="button" class="btn btn-light text-primary fw-semibold" data-bs-toggle="modal" data-bs-target="#modal_equipos">Nuevo equipo</button>
        </div>
        <!--Tabla-->
        <div class="row">
            <div class="col">
                <div class="tabla mt-2">
                    <table id="tablaEquipos" class="table table-striped dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Equipo</th>
                                <th scope="col">Modelo</th>
                                <th scope="col">No. serie</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Proveedor</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--Pantalla modal para agregar un nuevo equipo-->
    <div class="modal fade modal-xl mt-5" id="modal_equipos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo equipo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="nuevoEquipoForm" action="javascript:void();" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <label for="" class="fw-semibold">Equipo</label>
                                <input type="text" class="form-control" aria-label="equipo" id="inputEquipo" name="inputEquipo">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Modelo</label>
                                <input type="text" class="form-control" aria-label="modelo" id="inputModelo" name="inputModelo">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">No. serie</label>
                                <input type="text" class="form-control" aria-label="no. serie" id="inputSerie" name="inputSerie">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="" class="fw-semibold">Marca</label>
                                <input type="text" class="form-control" aria-label="marca" id="inputMarca" name="inputMarca">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Tipo de equipo</label>
                                <input type="text" class="form-control" aria-label="tipo equipo" id="inputTipoEquipo" name="inputTipoEquipo">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Descripción</label>
                                <input type="text" class="form-control" aria-label="desc" id="inputDescripcion" name="inputDescripcion">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-4">
                                <label for="" class="fw-semibold">Proveedor</label>
                                <input type="text" class="form-control" aria-label="proveedor" id="inputProveedor" name="inputProveedor">
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
    <!--Pantalla modal para editar a un equipo-->
    <div class="modal fade modal-xl mt-5" id="modal_editar_equipos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar equipo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editarEquipoForm">
                    <input type="hidden" name="id_equipo" id="id_equipo" value="">
                    <input type="hidden" name="trid" id="trid" value="">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <label for="" class="fw-semibold">Equipo</label>
                                <input type="text" class="form-control" aria-label="equipo" id="editarEquipo" name="editarEquipo">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Modelo</label>
                                <input type="text" class="form-control" aria-label="modelo" id="editarModelo" name="editarModelo">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">No. serie</label>
                                <input type="text" class="form-control" aria-label="no. serie" id="editarSerie" name="editarSerie">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="" class="fw-semibold">Marca</label>
                                <input type="text" class="form-control" aria-label="marca" id="editarMarca" name="editarMarca">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Tipo de equipo</label>
                                <input type="text" class="form-control" aria-label="tipo equipo" id="editarTipoEquipo" name="editarTipoEquipo">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Descripción</label>
                                <input type="text" class="form-control" aria-label="descripcion" id="editarDescripcion" name="editarDescripcion">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-4">
                                <label for="" class="fw-semibold">Proveedor</label>
                                <input type="text" class="form-control" aria-label="proveedor" id="editarProveedor" name="editarProveedor">
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
        //Mostrar equipos
        $(document).ready(function() {
            $('#tablaEquipos').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-MX.json',
                },
                //Esta función se llama cada que se va a crear una fila nueva con datatables
                "fnCreatedRow": function(nRow, aData, iDataIndex) {
                    $(nRow).attr('id_equipo', aData[0]);
                },
                'serverSide': 'true', //Los datos se procesan del lado del servidor
                'processing': 'true', //Muestra un indicador de carga mientras se procesan los datos
                'paging': 'true', //Habilita la paginación en la tabla.
                'order': [], //No ordena inicialmente los datos de la tabla.
                'ajax': { //Especifica la URL de la petición AJAX para recuperar los datos de la tabla
                    'url': '../../database/crud-equipo/mostrar-equipo.php',
                    'type': 'post',
                },
                "aoColumnDefs": [{ //Define opciones específicas para columnas individuales de la tabla
                    "bSortable": false,
                    "aTargets": [8] //Es la columna de opciones
                }, ]
            });
        });
        //==========Agregar Equipo==========
        $(document).on('submit', '#nuevoEquipoForm', function(event) { //Establece un controlador de eventos en el formulario para el evento submit
            event.preventDefault();
            //Se obtienen los valores de los campos
            var nom_equipo = $('#inputEquipo').val();
            var modelo_equipo = $('#inputModelo').val();
            var noSerie_equipo = $('#inputSerie').val();
            var id_marca = $('#inputMarca').val();
            var id_tipoEquipo = $('#inputTipoEquipo').val();
            var descripcion_equipo = $('#inputDescripcion').val();
            var id_proveedor = $('#inputProveedor').val();
            //Verifica que todos los campos esten llenos
            if (nom_equipo != '' && modelo_equipo != '' && noSerie_equipo != '' && id_marca != '' && id_tipoEquipo != '' && descripcion_equipo != '' && id_tipoEquipo != '') {
                $.ajax({ //Petición ajax para agregar
                    url: "../../database/crud-equipo/agregar-equipo.php",
                    data: {
                        nom_equipo: nom_equipo,
                        modelo_equipo: modelo_equipo,
                        noSerie_equipo: noSerie_equipo,
                        id_marca: id_marca,
                        id_tipoEquipo: id_tipoEquipo,
                        descripcion_equipo: descripcion_equipo,
                        id_proveedor: id_proveedor
                    },
                    type: 'post',
                    success: function(data) { //Vuelve a dibujar la tabla y oculta el modal
                        var json = JSON.parse(data);
                        status = json.status;
                        if (status == 'success') {
                            table = $('#tablaEquipos').DataTable();
                            table.draw();
                            $('#modal_equipos').modal('hide');
                            // Restablecer los campos del formulario
                            $('#nuevoEquipoForm')[0].reset();
                        }
                    }
                })
            } else {
                alert("Favor de llenar todos los campos")
            }
        });
        //==========Actualizar equipo==========
        $(document).on('submit', '#editarEquipoForm', function(e) { //Establece un controlador de eventos en el formulario para el evento submit
            e.preventDefault();
            //Se obtienen los valores de los campos
            var nom_equipo = $('#editarEquipo').val();
            var modelo_equipo = $('#editarModelo').val();
            var noSerie_equipo = $('#editarSerie').val();
            var id_marca = $('#editarMarca').val();
            var id_tipoEquipo = $('#editarTipoEquipo').val();
            var descripcion_equipo = $('#editarDescripcion').val();
            var id_proveedor = $('#editarProveedor').val();
            var trid = $('#trid_equipo').val();
            var id_equipo = $('#id_equipo').val();
            //Verifica que todos los campos esten llenos
            if (nom_equipo != '' && modelo_equipo != '' && noSerie_equipo != '' && id_marca != '' && id_tipoEquipo != '' && descripcion_equipo != '' && id_proveedor != '') {
                $.ajax({ //Petición ajax para actualizar
                    url: "../../database/crud-equipo/actualizar-equipo.php",
                    type: "post",
                    data: {
                        nom_equipo: nom_equipo,
                        modelo_equipo: modelo_equipo,
                        noSerie_equipo: noSerie_equipo,
                        id_marca: id_marca,
                        id_tipoEquipo: id_tipoEquipo,
                        descripcion_equipo: descripcion_equipo,
                        id_proveedor: id_proveedor,
                        id_equipo: id_equipo
                    },
                    success: function(data) { //Vuelve a dibujar la tabla y oculta el modal
                        var json = JSON.parse(data);
                        var status = json.status;
                        if (status == 'true') {
                            table = $('#tablaEquipos').DataTable();
                            table.draw();
                            $('#modal_editar_equipos').modal('hide');
                            var button = '<td><a href="javascript:void();" data-id_equipo="' + id_equipo + '" class="btn editbtn"><i role="button" class="fa-solid fa-pen-to-square text-primary"></i></a><a href="javascript:void();"  data-id_equipo="' + id_equipo + '"  class="btn deleteBtn"><i role="button" class="fa-solid fa-trash-can text-danger"></i></a></td>';
                            var row = table.row("[id_equipo='" + trid + "']");
                            row.row("[id_equipo='" + trid + "']").data([id_equipo, nom_equipo, modelo_equipo, noSerie_equipo, id_marca, id_tipoEquipo, descripcion_equipo, id_proveedor, button]);
                        } else {
                            alert('Failed');
                        }
                    }
                });
            } else {
                alert('Llenar todos los campos');
            }
        });
        //==========Editar equipo==========
        $('#tablaEquipos').on('click', '.editbtn ', function(event) { //Abre el modal de editar
            var table = $('#tablaEquipos').DataTable(); //Se inicializa la tabla mediante el uso del plugin jQuery DataTables
            var trid = $(this).closest('tr').attr('id_equipo'); //Se está obteniendo el ID que se va a editar. Esto se hace a través del uso de la función closest() que busca el elemento padre más cercano que tenga la etiqueta <tr>
            var id_equipo = $(this).data('id_equipo'); //Se está obteniendo el ID de la fila correspondiente al botón de edición al utilizar la función "data" que lee el valor del atributo "data-id" en el botón.
            $('#modal_editar_equipos').modal('show');
            $.ajax({ //Petición ajax para editar
                url: "../../database/crud-equipo/editar-equipo.php",
                data: {
                    id_equipo: id_equipo
                },
                type: 'post',
                success: function(data) {
                    var json = JSON.parse(data);
                    $('#editarEquipo').val(json.nom_equipo);
                    $('#editarModelo').val(json.modelo_equipo);
                    $('#editarSerie').val(json.noSerie_equipo);
                    $('#editarMarca').val(json.id_marca);
                    $('#editarTipoEquipo').val(json.id_tipoEquipo);
                    $('#editarDescripcion').val(json.descripcion_equipo);
                    $('#editarProveedor').val(json.id_proveedor);
                    $('#id_equipo').val(id_equipo);
                    $('#trid_equipo').val(trid);
                }
            })
        });
        //==========Eliminar equipo==========
        $(document).on('click', '.deleteBtn', function(event) { //Se abre una alerta para eliminar
            var table = $('#tablaEquipos').DataTable();
            event.preventDefault();
            var id_equipo = $(this).data('id_equipo'); //Se está obteniendo el ID de la fila correspondiente al botón de edición al utilizar la función "data" que lee el valor del atributo "data-id" en el botón.
            if (confirm("¿Eliminar equipo definitivamente?")) {
                $.ajax({
                    url: "../../database/crud-equipo/eliminar-equipo.php",
                    data: {
                        id_equipo: id_equipo
                    },
                    type: "post",
                    success: function(data) {
                        var json = JSON.parse(data);
                        status = json.status;
                        if (status == 'success') {
                            $("#" + id_equipo).closest('tr').remove();
                            table.draw();
                        } else {
                            alert('Failed');
                            return;
                        }
                    }
                });
            } else {
                return null;
            }
        }) 
    </script>
</body>

</html>