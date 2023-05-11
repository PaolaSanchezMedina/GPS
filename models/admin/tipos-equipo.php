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
            <h2>Tipos de equipos</h2>
            <button type="button" class="btn btn-light text-primary fw-semibold" data-bs-toggle="modal" data-bs-target="#modal_tipo_equipos">Nuevo tipo de equipo</button>
        </div>
        <!--Tabla-->
        <div class="row">
            <div class="col">
                <div class="tabla mt-2">
                    <table id="tablaTiposEquipo" class="table table-striped dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Clasificación</th>
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
    <!--Pantalla modal para agregar un nuevo tipo de equipo-->
    <div class="modal fade modal-xl mt-5" id="modal_tipo_equipos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo tipo de equipo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="nuevoTipoEquipoForm" action="javascript:void();" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <label for="" class="fw-semibold">Tipo de equipo</label>
                                <input type="text" class="form-control" aria-label="tipo de equipo" id="inputTipoE" name="inputTipoE">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Clasificación</label>
                                <input type="text" class="form-control" aria-label="clasificacion" id="inputClasificacion" name="inputClasificacion">
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
    <!--Pantalla modal para editar un tipo de equipo-->
    <div class="modal fade modal-xl mt-5" id="modal_editar_tipoEquipo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar tipo de equipo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editarTipoEquipoForm">
                    <input type="hidden" name="id_tipoEquipo" id="id_tipoEquipo" value="">
                    <input type="hidden" name="trid" id="trid" value="">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <label for="" class="fw-semibold">Tipo de equipo</label>
                                <input type="text" class="form-control" aria-label="tipo de equipo" id="editarTipoE" name="editarTipoE">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Clasificación</label>
                                <input type="text" class="form-control" aria-label="Clasificacion" id="editarClasificacion" name="editarClasificacion">
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
        //Mostrar tipos de equipos
        $(document).ready(function() {
            $('#tablaTiposEquipo').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-MX.json',
                },
                //Esta función se llama cada que se va a crear una fila nueva con datatables
                "fnCreatedRow": function(nRow, aData, iDataIndex) {
                    $(nRow).attr('id_tipoEquipo', aData[0]);
                },
                'serverSide': 'true', //Los datos se procesan del lado del servidor
                'processing': 'true', //Muestra un indicador de carga mientras se procesan los datos
                'paging': 'true', //Habilita la paginación en la tabla.
                'order': [], //No ordena inicialmente los datos de la tabla.
                'ajax': { //Especifica la URL de la petición AJAX para recuperar los datos de la tabla
                    'url': '../../database/crud-tipoEquipo/mostrar-tipoEquipo.php',
                    'type': 'post',
                },
                "aoColumnDefs": [{ //Define opciones específicas para columnas individuales de la tabla
                    "bSortable": false,
                    "aTargets": [3] //Es la columna de opciones
                }, ]
            })
        });
        //==========Agregar tipo de equipo==========
        $(document).on('submit', '#nuevoTipoEquipoForm', function(event) { //Establece un controlador de eventos en el formulario para el evento submit
            event.preventDefault();
            //Se obtienen los valores de los campos
            var nom_tipoEquipo = $('#inputTipoE').val();
            var id_clasiEquipo = $('#inputClasificacion').val();
            //Verifica que todos los campos esten llenos
            if (nom_tipoEquipo != '' && id_clasiEquipo != '') {
                $.ajax({ //Petición ajax para agregar
                    url: "../../database/crud-tipoEquipo/agregar-tipoEquipo.php",
                    data: {
                        nom_tipoEquipo: nom_tipoEquipo,
                        id_clasiEquipo: id_clasiEquipo
                    },
                    type: 'post',
                    success: function(data) { //Vuelve a dibujar la tabla y ocultar el modal
                        var json = JSON.parse(data);
                        status = json.status;
                        if (status == 'success') {
                            table = $('#tablaTiposEquipo').DataTable();
                            table.draw();
                            $('#modal_tipo_equipos').modal('hide');
                        }
                    }
                })
            } else {
                alert("Favor de llenar todos los campos")
            }
        });
        //==========Actualizar marca=========
        $(document).on('submit', '#editarTipoEquipoForm', function(e) { //Establece un controlador de eventos en el formulario para el evento submit
            e.preventDefault();
            //Se obtienen los valores de los campos
            var nom_tipoEquipo = $('#editarTipoE').val();
            var id_clasiEquipo = $('#editarClasificacion').val();
            var trid = $('#trid').val();
            var id_tipoEquipo = $('#id_tipoEquipo').val();
            console.log(id_tipoEquipo);
            //Verifica que todos los campos esten llenos
            if (nom_tipoEquipo != '' && id_clasiEquipo != '') {
                $.ajax({ //Petición ajax para actualizar
                    url: "../../database/crud-tipoEquipo/actualizar-tipoEquipo.php",
                    type: "post",
                    data: {
                        nom_tipoEquipo: nom_tipoEquipo,
                        id_clasiEquipo: id_clasiEquipo,
                        id_tipoEquipo: id_tipoEquipo
                    },
                    success: function(data) { //Vuelve a dibujar la tabla y oculta el modal
                        var json = JSON.parse(data);
                        var status = json.status;
                        if (status == 'true') {
                            table = $('#tablaTiposEquipo').DataTable();
                            table.draw();
                            $('#modal_editar_tipoEquipo').modal('hide');
                            var button = '<td><a href="javascript:void();" data-id_tipoEquipo="' + id_tipoEquipo + '" class="btn editbtn"><i role="button" class="fa-solid fa-pen-to-square text-primary"></i></a><a href="javascript:void();"  data-id_tipoEquipo="' + id_tipoEquipo + '"  class="btn deleteBtn"><i role="button" class="fa-solid fa-trash-can text-danger"></i></a></td>';
                            var row = table.row("[id_tipoEquipo='" + trid + "']");
                            row.row("[id_tipoEquipo='" + trid + "']").data([id_tipoEquipo, nom_tipoEquipo, id_clasiEquipo, button]);
                        } else {
                            alert('Failed');
                        }
                    }
                });
            } else {
                alert('Llenar todos los campos');
            }
        });
        //==========Editar tipo equipo==========
        $('#tablaTiposEquipo').on('click', '.editbtn ', function(event) { //Abre el modal de editar
            var table = $('#tablaTiposEquipo').DataTable(); //Se inicializa la tabla mediante el uso del plugin jQuery DataTables
            var trid = $(this).closest('tr').attr('id_tipoEquipo'); //Se está obteniendo el ID que se va a editar. Esto se hace a través del uso de la función closest() que busca el elemento padre más cercano que tenga la etiqueta <tr>
            var id_tipoEquipo = trid; //Se está obteniendo el ID de la fila correspondiente al botón de edición al utilizar la función "data" que lee el valor del atributo "data-id" en el botón.
            console.log(id_tipoEquipo);
            $('#modal_editar_tipoEquipo').modal('show');
            $.ajax({ //Petición ajax para editar
                url: "../../database/crud-tipoEquipo/editar-tipoEquipo.php",
                data: {
                    id_tipoEquipo: id_tipoEquipo,

                },
                type: 'post',
                success: function(data) {
                    var json = JSON.parse(data);
                    $('#editarTipoE').val(json.nom_tipoEquipo);
                    $('#editarClasificacion').val(json.id_clasiEquipo);
                    $('#id_tipoEquipo').val(id_tipoEquipo);
                    $('#trid_tipoEquipo').val(trid);
                }
            })
        });
        //==========Eliminar marca==========
        $(document).on('click', '.deleteBtn', function(event) { //Se abre una alerta para eliminar
            var table = $('#tablaTiposEquipo').DataTable();
            event.preventDefault();
            var trid = $(this).closest('tr').attr('id_tipoEquipo'); //Se está obteniendo el ID que se va a editar. Esto se hace a través del uso de la función closest() que busca el elemento padre más cercano que tenga la etiqueta <tr>
            var id_tipoEquipo = trid; //Se está obteniendo el ID de la fila correspondiente al botón de edición al utilizar la función "data" que lee el valor del atributo "data-id" en el botón.
            if (confirm("¿Eliminar tipo de equipo definitivamente?")) {
                $.ajax({
                    url: "../../database/crud-tipoEquipo/eliminar-tipoEquipo.php",
                    data: {
                        id_tipoEquipo: id_tipoEquipo
                    },
                    type: "post",
                    success: function(data) {
                        var json = JSON.parse(data);
                        status = json.status;
                        if (status == 'success') {
                            $("#" + id_tipoEquipo).closest('tr').remove();
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