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
            <h2>Proveedores</h2>
            <button type="button" class="btn btn-light text-primary fw-semibold" data-bs-toggle="modal" data-bs-target="#modal_proveedores">Nuevo proveedor</button>
        </div>
        <!--Tabla-->
        <div class="row">
            <div class="col">
                <div class="tabla mt-2">
                    <table id="tablaProveedores" class="table table-striped dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">SAP</th>
                                <th scope="col">RFC</th>
                                <th scope="col">Contacto</th>
                                <th scope="col">Calle</th>
                                <th scope="col">Colonia</th>
                                <th scope="col">Código postal</th>
                                <th scope="col">Correo</th>
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
    <!--Pantalla modal para agregar un nuevo proveedor-->
    <div class="modal fade modal-xl mt-5" id="modal_proveedores" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo proveedor</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="nuevoProveedorForm" action="javascript:void();" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <label for="" class="fw-semibold">Nombre</label>
                                <input type="text" class="form-control" aria-label="nombre" id="inputNombre" name="inputNombre">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">SAP</label>
                                <input type="text" class="form-control" aria-label="sap" id="inputSAP" name="inputSAP">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">RFC</label>
                                <input type="text" class="form-control" aria-label="rfc" id="inputRFC" name="inputRFC">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="" class="fw-semibold">Contacto</label>
                                <input type="text" class="form-control" aria-label="contacto" id="inputContacto" name="inputContacto">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Calle</label>
                                <input type="text" class="form-control" aria-label="calle" id="inputCalle" name="inputCalle">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Colonia</label>
                                <input type="text" class="form-control" aria-label="colonia" id="inputColonia" name="inputColonia">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="" class="fw-semibold">Código postal</label>
                                <input type="text" class="form-control" aria-label="codigo postal" id="inputCP" name="inputCP">
                            </div>
                            <div class="col-lg-4">
                                <label for="" class="fw-semibold">Correo</label>
                                <input type="text" class="form-control" aria-label="correo" id="inputCorreo" name="inputCorreo">
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
    <!--Pantalla modal para editar a un proveedor-->
    <div class="modal fade modal-xl mt-5" id="modal_editar_proveedores" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar proveedor</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editarProveedorForm">
                    <input type="hidden" name="id_proveedor" id="id_proveedor" value="">
                    <input type="hidden" name="trid" id="trid" value="">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <label for="" class="fw-semibold">Nombre</label>
                                <input type="text" class="form-control" aria-label="nombre" id="editarNombre" name="editarNombre">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">SAP</label>
                                <input type="text" class="form-control" aria-label="sap" id="editarSAP" name="editarSAP">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">RFC</label>
                                <input type="text" class="form-control" aria-label="rfc" id="editarRFC" name="editarRFC">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="" class="fw-semibold">Contacto</label>
                                <input type="text" class="form-control" aria-label="contacto" id="editarContacto" name="editarContacto">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Calle</label>
                                <input type="text" class="form-control" aria-label="calle" id="editarCalle" name="editarCalle">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Colonia</label>
                                <input type="text" class="form-control" aria-label="colonia" id="editarColonia" name="editarColonia">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="" class="fw-semibold">Código postal</label>
                                <input type="text" class="form-control" aria-label="codigo postal" id="editarCP" name="editarCP">
                            </div>
                            <div class="col-lg-4">
                                <label for="" class="fw-semibold">Correo</label>
                                <input type="text" class="form-control" aria-label="correo" id="editarCorreo" name="editarCorreo">
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
        //Mostrar proovedores
        $(document).ready(function() {
            $('#tablaProveedores').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-MX.json',
                },
                //Esta función se llama cada que se va a crear una fila nueva con datatables
                "fnCreatedRow": function(nRow, aData, iDataIndex) {
                    $(nRow).attr('id_proveedor', aData[0]);
                },
                'serverSide': 'true', //Los datos se procesan del lado del servidor
                'processing': 'true', //Muestra un indicador de carga mientras se procesan los datos
                'paging': 'true', //Habilita la paginación en la tabla.
                'order': [], //No ordena inicialmente los datos de la tabla.
                'ajax': { //Especifica la URL de la petición AJAX para recuperar los datos de la tabla
                    'url': '../../database/crud-proovedor/mostrar-proovedor.php',
                    'type': 'post',
                },
                "aoColumnDefs": [{ //Define opciones específicas para columnas individuales de la tabla
                    "bSortable": false, //La columna 7 de la tabla no se puede ordenar
                    "aTargets": [9] //Es la columna de opciones
                }, ]
            })
        });
        //==========Agregar Proovedor==========
        $(document).on('submit', '#nuevoProveedorForm', function(event) { //Establece un controlador de eventos en el formulario para el evento submit
            event.preventDefault();
            //Se obtienen los valores de los campos
            var nom_proveedor = $('#inputNombre').val();
            var noProvSAP_proveedor = $('#inputSAP').val();
            var RFC_proveedor = $('#inputRFC').val();
            var contacto_proveedor = $('#inputContacto').val();
            var calle_proveedor = $('#inputCalle').val();
            var colonia_proveedor = $('#inputColonia').val();
            var codigoPostal_proveedor = $('#inputCP').val();
            var correo_proveedor = $('#inputCorreo').val();
            //Verifica que todos los campos esten llenos
            if (nom_proveedor != '' && noProvSAP_proveedor != '' && RFC_proveedor != '' && contacto_proveedor != '' && calle_proveedor != '' && colonia_proveedor != '' && codigoPostal_proveedor != '' && correo_proveedor != '') {
                $.ajax({ //Petición ajax para agregar
                    url: "../../database/crud-proovedor/agregar-proovedor.php",
                    data: {
                        nom_proveedor: nom_proveedor,
                        noProvSAP_proveedor: noProvSAP_proveedor,
                        RFC_proveedor: RFC_proveedor,
                        contacto_proveedor: contacto_proveedor,
                        calle_proveedor: calle_proveedor,
                        colonia_proveedor: colonia_proveedor,
                        codigoPostal_proveedor: codigoPostal_proveedor,
                        correo_proveedor: correo_proveedor
                    },
                    type: 'post',
                    success: function(data) { //Vuelve a dibujar la tabla y oculta el modal
                        var json = JSON.parse(data);
                        status = json.status;
                        if (status == 'success') {
                            table = $('#tablaProveedores').DataTable();
                            table.draw();
                            $('#modal_proveedores').modal('hide');
                            // Restablecer los campos del formulario
                            $('#nuevoProveedorForm')[0].reset();
                        }
                    }
                })
            } else {
                alert("Favor de llenar todos los campos")
            }
        });
        //==========Actualizar Proovedor==========
        $(document).on('submit', '#editarProveedorForm', function(e) { //Establece un controlador de eventos en el formulario para el evento submit
            e.preventDefault();
            //Se obtienen los valores de los campos
            var nom_proveedor = $('#editarNombre').val();
            var noProvSAP_proveedor = $('#editarSAP').val();
            var RFC_proveedor = $('#editarRFC').val();
            var contacto_proveedor = $('#editarContacto').val();
            var calle_proveedor = $('#editarCalle').val();
            var colonia_proveedor = $('#editarColonia').val();
            var codigoPostal_proveedor = $('#editarCP').val();
            var correo_proveedor = $('#editarCorreo').val();
            var trid = $('#id_proveedor').val();
            var id_proveedor = $('#id_proveedor').val();
            //Verifica que todos los campos esten llenos
            if (nom_proveedor != '' && noProvSAP_proveedor != '' && RFC_proveedor != '' && contacto_proveedor != '' && calle_proveedor != '' && colonia_proveedor != '' && codigoPostal_proveedor != '' && correo_proveedor != '') {
                $.ajax({ //Petición ajax para actualizar
                    url: "../../database/crud-proovedor/actualizar-proovedor.php",
                    type: "post",
                    data: {
                        nom_proveedor: nom_proveedor,
                        noProvSAP_proveedor: noProvSAP_proveedor,
                        RFC_proveedor: RFC_proveedor,
                        contacto_proveedor: contacto_proveedor,
                        calle_proveedor: calle_proveedor,
                        colonia_proveedor: colonia_proveedor,
                        codigoPostal_proveedor: codigoPostal_proveedor,
                        correo_proveedor: correo_proveedor,
                        id_proveedor: id_proveedor
                    },
                    success: function(data) { //Vuelve a dibujar la tabla y oculta el modal
                        var json = JSON.parse(data);
                        var status = json.status;
                        if (status == 'true') {
                            table = $('#tablaProveedores').DataTable();
                            table.draw();
                            $('#modal_editar_proveedores').modal('hide');
                            var button = '<td><a href="javascript:void();" data-id_proveedor="' + id_proveedor + '" class="btn editbtn"><i role="button" class="fa-solid fa-pen-to-square text-primary"></i></a><a href="javascript:void();"  data-id_proveedor="' + id_proveedor + '"  class="btn deleteBtn"><i role="button" class="fa-solid fa-trash-can text-danger"></i></a></td>';
                            var row = table.row("[id_proveedor='" + trid + "']");
                            row.row("[id_proveedor='" + trid + "']").data([id_proveedor, nom_proveedor, noProvSAP_proveedor, RFC_proveedor, contacto_proveedor, calle_proveedor, colonia_proveedor, codigoPostal_proveedor, correo_proveedor, button]);
                        } else {
                            alert('Failed');
                        }
                    }
                });
            } else {
                alert('Llenar todos los campos');
            }
        });
        //==========Editar Proovedor==========
        $('#tablaProveedores').on('click', '.editbtn ', function(event) { //Abre el modal de editar
            var table = $('#tablaProveedores').DataTable(); //Se inicializa la tabla mediante el uso del plugin jQuery DataTables
            var trid = $(this).closest('tr').attr('id_proveedor'); //Se está obteniendo el ID que se va a editar. Esto se hace a través del uso de la función closest() que busca el elemento padre más cercano que tenga la etiqueta <tr>
            var id_proveedor = $(this).data('id_proveedor'); //Se está obteniendo el ID de la fila correspondiente al botón de edición al utilizar la función "data" que lee el valor del atributo "data-id" en el botón.
            console.log(id_proveedor);
            $('#modal_editar_proveedores').modal('show');
            $.ajax({ //Petición ajax para editar
                url: "../../database/crud-proovedor/editar-proovedor.php",
                data: {
                    id_proveedor: id_proveedor
                },
                type: 'post',
                success: function(data) {
                    var json = JSON.parse(data);
                    $('#editarNombre').val(json.nom_proveedor);
                    $('#editarSAP').val(json.noProvSAP_proveedor);
                    $('#editarRFC').val(json.RFC_proveedor);
                    $('#editarContacto').val(json.contacto_proveedor);
                    $('#editarCalle').val(json.calle_proveedor);
                    $('#editarColonia').val(json.colonia_proveedor);
                    $('#editarCP').val(json.codigoPostal_proveedor);
                    $('#editarCorreo').val(json.correo_proveedor);
                    $('#id_proveedor').val(id_proveedor);
                    $('#trid_proveedor').val(trid);
                }
            })
        });
        //==========Eliminar Proovedor==========
        $(document).on('click', '.deleteBtn', function(event) { //Se abre una alerta para eliminar
            var table = $('#tablaProveedores').DataTable();
            event.preventDefault();
            var id_proveedor = $(this).data('id_proveedor'); //Se está obteniendo el ID de la fila correspondiente al botón de edición al utilizar la función "data" que lee el valor del atributo "data-id" en el botón.
            if (confirm("¿Eliminar proovedor definitivamente?")) {
                $.ajax({
                    url: "../../database/crud-proovedor/eliminar-proovedor.php",
                    data: {
                        id_proveedor: id_proveedor
                    },
                    type: "post",
                    success: function(data) {
                        var json = JSON.parse(data);
                        status = json.status;
                        if (status == 'success') {
                            $("#" + id_proveedor).closest('tr').remove();
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