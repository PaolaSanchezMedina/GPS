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
                        <a class="nav-link text-light" aria-current="page" href=../admin/asignar-equipo.php>Asignar equipos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-current="page" href=../admin/usuarios.php>Usuarios</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Catálogos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../admin/tipo-equipo.php">Tipos de equipos</a></li>
                            <li><a class="dropdown-item" href="../admin/proveedores.php">Proveedores</a></li>
                            <li><a class="dropdown-item" href="../admin/accesorios.php">Accesorios</a></li>
                            <li><a class="dropdown-item" href="../admin/localidades.php">Localidades</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <form class="d-flex" action="../../models/login.php">
                <button class="btn border-white text-light rounded-4 fs-5 fw-semibold me-3 mt-2" type="submit">Cerrar sesión</button>
            </form>
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
                                <th scope="col">Nombre</th>
                                <th scope="col">1er Apellido</th>
                                <th scope="col">2do Apellido</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Contraseña</th>
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
                <form id="nuevoUsuarioForm" action="javascript:void();" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <label for="" class="fw-semibold">Nombre</label>
                                <input type="text" class="form-control" aria-label="nombre" id="inputNombre" name="inputNombre">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Primer apellido</label>
                                <input type="text" class="form-control" aria-label="apellido p" id="inputApellidoP" name="inputApellidoP">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Segundo apellido</label>
                                <input type="text" class="form-control" aria-label="apellido m" id="inputApellidoM" name="inputApellidoP">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="" class="fw-semibold">Usuario</label>
                                <input type="text" class="form-control" aria-label="usuario" id="inputUsuario" name="inputUsuario">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Contraseña</label>
                                <input type="text" class="form-control" aria-label="contra" id="inputContra" name="inputContra">
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
                        <input type="hidden" name="idusuario" id="idusuario" value="">
                        <input type="hidden" name="trid" id="trid" value="">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col">
                                    <label for="" class="fw-semibold">Nombre</label>
                                    <input type="text" class="form-control" aria-label="nombre" id="editarNombre" name="editarNombre">
                                </div>
                                <div class="col">
                                    <label for="" class="fw-semibold">Primer apellido</label>
                                    <input type="text" class="form-control" aria-label="apellido p" id="editarApellidoP" name="editarApellidoP">
                                </div>
                                <div class="col">
                                    <label for="" class="fw-semibold">Segundo apellido</label>
                                    <input type="text" class="form-control" aria-label="apellido m" id="editarApellidoM" name="editarApellidoM">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label for="" class="fw-semibold">Usuario</label>
                                    <input type="text" class="form-control" aria-label="usuario" id="editarUsuario" name="editarUsuario">
                                </div>
                                <div class="col">
                                    <label for="" class="fw-semibold">Contraseña</label>
                                    <input type="text" class="form-control" aria-label="contra" id="editarContra" name="editarContra">
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
        <div class="d-flex justify-content-between">
            <p id="fecha-hora" class="ms-5"></p>
            <p>&copy; SiCEI 2023</p>
        </div>
    </footer>
    <!--========================================SCRIPT PARA EL CRUD========================================-->
    <script type="text/javascript">
        //Mostrar usuarios
        $(document).ready(function() {
            $('#tablaUsuarios').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-MX.json',
                },
                "fnCreatedRow": function(nRow, aData, iDataIndex) {
                    $(nRow).attr('idusuario', aData[0]);
                },
                'serverSide': 'true',
                'processing': 'true',
                'paging': 'true',
                'order': [],
                'ajax': {
                    'url': '../../database/crud-usuario/mostrar-usuario.php',
                    'type': 'post',
                },
                "aoColumnDefs": [{
                    "bSortable": false,
                    "aTargets": [6]
                }, ]
            });
        });
        //Agregar usuarios
        $(document).on('submit', '#nuevoUsuarioForm', function(event) {
            event.preventDefault();
            var nombre = $('#inputNombre').val();
            var apellidop = $('#inputApellidoP').val();
            var apellidom = $('#inputApellidoM').val();
            var usuario = $('#inputUsuario').val();
            var contra = $('#inputContra').val();
            if (nombre != '' && apellidop != '' && apellidom != '' && usuario != '' && contra != '') {
                $.ajax({
                    url: "../../database/crud-usuario/agregar-usuario.php",
                    data: {
                        nombre: nombre,
                        apellidop: apellidop,
                        apellidom: apellidom,
                        usuario: usuario,
                        contra: contra
                    },
                    type: 'post',
                    success: function(data) {
                        var json = JSON.parse(data);
                        status = json.status;
                        if (status == 'success') {
                            table = $('#tablausuarios').DataTable();
                            table.draw();
                            $('#modal_usuarios').modal('hide');
                        }
                    }
                })
            } else {
                alert("Favor de llenar todos los campos")
            }
        });
        //Actualizar usuarios
        $(document).on('submit', '#editarUsuarioForm', function(e) {
            e.preventDefault();
            var nombre = $('#editarNombre').val();
            var apellidop = $('#editarApellidoP').val();
            var apellidom = $('#editarApellidoM').val();
            var usuario = $('#editarUsuario').val();
            var contra = $('#editarContra').val();
            var trid = $('#tridusuario').val();
            var idusuario = $('#idusuario').val();
            if (nombre != '' && apellidop != '' && apellidom != '' && usuario != '' && contra != '') {
                $.ajax({
                    url: "../../database/crud-usuario/actualizar-usuario.php",
                    type: "post",
                    data: {
                        nombre: nombre,
                        apellidop: apellidop,
                        apellidom: apellidom,
                        usuario: usuario,
                        contra: contra,
                        idusuario: idusuario
                    },
                    success: function(data) {
                        var json = JSON.parse(data);
                        var status = json.status;
                        if (status == 'true') {
                            table = $('#tablaUsuarios').DataTable();
                            $('#modal_editar_usuarios').modal('hide');
                            var button = '<td><a href="javascript:void();" data-idusuario="' + idusuario + '" class="btn editbtn"><i role="button" class="fa-solid fa-user-pen text-primary"></i></a><a href="javascript:void();"  data-idusuario="' + idusuario + '"  class="btn deleteBtn"><i role="button" class="fa-solid fa-user-xmark text-danger"></i></a></td>';
                            var row = table.row("[idusuario='" + trid + "']");
                            row.row("[idusuario='" + trid + "']").data([idusuario, nombre, apellidop, apellidom, usuario, contra, button]);
                        } else {
                            alert('failed');
                        }
                    }
                });
            } else {
                alert('Llenar todos los campos');
            }
        });
        //Editar usuarios
        $('#tablaUsuarios').on('click', '.editbtn ', function(event) {
            var table = $('#tablaUsuarios').DataTable();
            var trid = $(this).closest('tr').attr('idusuario');
            var idusuario = $(this).data('idusuario');
            $('#modal_editar_usuarios').modal('show');
            $.ajax({
                url: "../../database/crud-usuario/editar-usuario.php",
                data: {
                    idusuario: idusuario
                },
                type: 'post',
                success: function(data) {
                    var json = JSON.parse(data);
                    $('#editarNombre').val(json.nombre);
                    $('#editarApellidoP').val(json.apellidop);
                    $('#editarApellidoM').val(json.apellidom);
                    $('#editarUsuario').val(json.usuario);
                    $('#editarContra').val(json.contra);
                    $('#idusuario').val(idusuario);
                    $('#tridusuario').val(trid);
                }
            })
        });
        //Eliminar usuarios
        $(document).on('click', '.deleteBtn', function(event) {
            var table = $('#tablaUsuarios').DataTable();
            event.preventDefault();
            var idusuario = $(this).data('idusuario');
            if (confirm("¿Eliminar usuario definitivamente?")) {
                $.ajax({
                    url: "../../database/crud-usuario/eliminar-usuario.php",
                    data: {
                        idusuario: idusuario
                    },
                    type: "post",
                    success: function(data) {
                        var json = JSON.parse(data);
                        status = json.status;
                        if (status == 'success') {
                            $("#" + idusuario).closest('tr').remove();
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