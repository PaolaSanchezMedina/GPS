<?php include('../../database/conexion.php');
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
            <a class="navbar-brand text-light fs-2 fw-semibold ms-3" href=../admin/inicio.php>
                <img src="../../assets/img/logo.png" alt="Logo" width="40" height="38" class="d-inline-block align-text-bottom mt-1">
                SiCEI
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-current="page" href=../admin/inicio.php>Mi perfil</a>
                    </li>
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
                            <li><a class="dropdown-item" href="../admin/tipo-equipo.php">Tipos de equipos</a></li>
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
            <h2>Usuarios</h2>
            <button type="button" class="btn btn-light text-primary fw-semibold" data-bs-toggle="modal" data-bs-target="#modal_usuarios">Nuevo usuario</button>
        </div>
        <!--Tabla-->
        <div class="row">
            <div class="col">
                <div class="tabla mt-2">
                    <table id="tablaUsuarios" class="table table-striped dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Contraseña</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Colaborador</th>
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
    <!--Pantalla modal para agregar un nuevo usuario-->
    <div class="modal fade modal-xl mt-5" id="modal_usuarios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo usuario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="nuevoUsuarioForm" action="" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <label for="" class="fw-semibold">Usuario</label>
                                <input type="text" class="form-control" aria-label="usuario" id="inputUsuario" name="inputUsuario">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Contraseña</label>
                                <input type="text" class="form-control" aria-label="contra" id="inputContrasena" name="inputContra">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="" class="fw-semibold">Tipo de usuario</label>
                                <select class="form-select" aria-label="Default select example" name="inputTipo" id="inputTipo">
                                    <option value="1">Administrador</option>
                                    <option value="2">Supervisor</option>
                                    <option value="3">Usuario general</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Colaborador</label>
                                <input type="text" class="form-control" aria-label="contra" id="inputColaborador" name="inputColaborador">
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
    <!--Pantalla modal para editar a un usuario-->
    <div class="modal fade modal-xl mt-5" id="modal_editar_usuarios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editarUsuarioForm">
                        <input type="hidden" name="id_usuario" id="id_usuario" value="">
                        <input type="hidden" name="trid" id="trid" value="">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col">
                                    <label for="" class="fw-semibold">Usuario</label>
                                    <input type="text" class="form-control" aria-label="usuario" id="editarUsuario" name="editarUsuario">
                                </div>
                                <div class="col">
                                    <label for="" class="fw-semibold">Contraseña</label>
                                    <input type="text" class="form-control" aria-label="contra" id="editarContrasena" name="editarContra">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label for="" class="fw-semibold">Tipo de usuario</label>
                                    <select class="form-select" aria-label="Default select example" name="editarTipo" id="editarTipo">
                                        <option value="1">Administrador</option>
                                        <option value="2">Supervisor</option>
                                        <option value="3">Usuario general</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="" class="fw-semibold">Colaborador</label>
                                    <input type="text" class="form-control" aria-label="contra" id="editarColaborador" name="editarTipo">
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
        //==========Mostrar usuarios==========
        $(document).ready(function() {
            $('#tablaUsuarios').DataTable({
                language: {
                    //Cambia el idioma a español
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-MX.json',
                },
                //Esta función se llama cada que se va a crear una fila nueva con datatables
                "fnCreatedRow": function(nRow, aData, iDataIndex) {
                    $(nRow).attr('id_usuario', aData[0]);
                },
                'serverSide': 'true', //Los datos se procesan del lado del servidor
                'processing': 'true', //Muestra un indicador de carga mientras se procesan los datos
                'paging': 'true', //Habilita la paginación en la tabla.
                'order': [], //No ordena inicialmente los datos de la tabla.
                'ajax': { //Especifica la URL de la petición AJAX para recuperar los datos de la tabla
                    'url': '../../database/crud-usuario/mostrar-usuario.php',
                    'type': 'post',
                },
                "aoColumnDefs": [{ //Define opciones específicas para columnas individuales de la tabla
                    "bSortable": false, //Desabilita el ordenamiento de una columna
                    "aTargets": [5] //Es la columna de opciones
                }, ]
            });
        });
        //==========Agregar usuarios==========
        $(document).on('submit', '#nuevoUsuarioForm', function(event) { //Establece un controlador de eventos en el formulario para el evento submit
            event.preventDefault();
            //Se obtienen los valores de los campos
            var nom_usuario = $('#inputUsuario').val();
            var contrasena_usuario = $('#inputContrasena').val();
            var id_tipoUsuario = $('#inputTipo').val();
            var id_colaborador = $('#inputColaborador').val();
            //Verifica que todos los campos esten llenos
            if (nom_usuario != '' && contrasena_usuario != '' && id_tipoUsuario != '' && id_colaborador != '') {
                $.ajax({ //Petición ajax para agregar
                    url: "../../database/crud-usuario/agregar-usuario.php",
                    data: {
                        nom_usuario: nom_usuario,
                        contrasena_usuario: contrasena_usuario,
                        id_tipoUsuario: id_tipoUsuario,
                        id_colaborador: id_colaborador
                    },
                    type: 'post',
                    success: function(data) { //Vuelve a dibujar la tabla y ocultar el modal
                        var json = JSON.parse(data);
                        status = json.status;
                        if (status == 'success') {
                            table = $('#tablaUsuarios').DataTable();
                            table.draw();
                            $('#modal_usuarios').modal('hide');
                        }
                    }
                })
            } else {
                alert("Favor de llenar todos los campos")
            }
        });
        //==========Actualizar usuarios==========
        $(document).on('submit', '#editarUsuarioForm', function(e) { //Establece un controlador de eventos en el formulario para el evento submit
            e.preventDefault();
            //Se obtienen los valores de los campos
            var nom_usuario = $('#editarUsuario').val();
            var contrasena_usuario = $('#editarContrasena').val();
            var id_tipoUsuario = $('#editarTipo').val();
            var id_colaborador = $('#editarColaborador').val();
            var trid = $('#trid_usuario').val();
            var id_usuario = $('#id_usuario').val();
            //Verifica que todos los campos esten llenos
            if (nom_usuario != '' && contrasena_usuario != '' && id_tipoUsuario != '' && id_colaborador != '') {
                $.ajax({ //Petición ajax para actualizar
                    url: "../../database/crud-usuario/actualizar-usuario.php",
                    type: "post",
                    data: {
                        nom_usuario: nom_usuario,
                        contrasena_usuario: contrasena_usuario,
                        id_tipoUsuario: id_tipoUsuario,
                        id_colaborador: id_colaborador,
                        id_usuario: id_usuario
                    },
                    success: function(data) { //Vuelve a dibujar la tabla y ocultar el modal
                        var json = JSON.parse(data);
                        var status = json.status;
                        if (status == 'true') {
                            table = $('#tablaUsuarios').DataTable();
                            table.draw();
                            $('#modal_editar_usuarios').modal('hide');
                            var button = '<td><a href="javascript:void();" data-id_usuario="' + id_usuario + '" class="btn editbtn"><i role="button" class="fa-solid fa-user-pen text-primary"></i></a><a href="javascript:void();"  data-id_usuario="' + id_usuario + '"  class="btn deleteBtn"><i role="button" class="fa-solid fa-user-xmark text-danger"></i></a></td>';
                            var row = table.row("[id_usuario='" + trid + "']");
                            row.row("[id_usuario='" + trid + "']").data([id_usuario, nom_usuario, contrasena_usuario, id_tipoUsuario, id_colaborador, button]);
                        } else {
                            alert('Failed');
                        }
                    }
                });
            } else {
                alert('Llenar todos los campos');
            }
        });
        //==========Editar usuarios==========
        $('#tablaUsuarios').on('click', '.editbtn ', function(event) { //Abre el modal de editar
            var table = $('#tablaUsuarios').DataTable(); //Se inicializa la tabla mediante el uso del plugin jQuery DataTables
            var trid = $(this).closest('tr').attr('id_usuario'); //Se está obteniendo el ID que se va a editar. Esto se hace a través del uso de la función closest() que busca el elemento padre más cercano que tenga la etiqueta <tr>
            var id_usuario = $(this).data('id_usuario'); //Se está obteniendo el ID de la fila correspondiente al botón de edición al utilizar la función "data" que lee el valor del atributo "data-id" en el botón.
            $('#modal_editar_usuarios').modal('show');
            $.ajax({ //Petición ajax para editar
                url: "../../database/crud-usuario/editar-usuario.php",
                data: {
                    id_usuario: id_usuario
                },
                type: 'post',
                success: function(data) {
                    var json = JSON.parse(data);
                    $('#editarUsuario').val(json.nom_usuario);
                    $('#editarContrasena').val(json.contrasena_usuario);
                    $('#editarTipo').val(json.id_tipoUsuario);
                    $('#editarColaborador').val(json.id_colaborador);
                    $('#id_usuario').val(id_usuario);
                    $('#trid_usuario').val(trid);
                }
            })
        });
        //==========Eliminar usuarios==========
        $(document).on('click', '.deleteBtn', function(event) { //Se abre una alerta para eliminar
            var table = $('#tablaUsuarios').DataTable();
            event.preventDefault();
            var id_usuario = $(this).data('id_usuario'); //Se está obteniendo el ID de la fila correspondiente al botón de edición al utilizar la función "data" que lee el valor del atributo "data-id" en el botón.
            if (confirm("¿Eliminar usuario definitivamente?")) {
                $.ajax({
                    url: "../../database/crud-usuario/eliminar-usuario.php",
                    data: {
                        id_usuario: id_usuario
                    },
                    type: "post",
                    success: function(data) {
                        var json = JSON.parse(data);
                        status = json.status;
                        if (status == 'success') {
                            $("#" + id_usuario).closest('tr').remove();
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