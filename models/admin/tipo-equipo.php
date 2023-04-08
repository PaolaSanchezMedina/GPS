<?php
session_start();
if(empty($_SESSION["id"])){
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
                            <li><a class="dropdown-item" href="../admin/colaboradores.php">Colaboradores</a></li>
                            <li><a class="dropdown-item" href="../admin/localidades.php">Localidades</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-current="page" href=../admin/prestamos-admin.php>Solicitar préstamo</a>
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
            <button type="button" class="btn btn-light text-primary fw-semibold" data-bs-toggle="modal" data-bs-target="#modal_equipos">Nuevo equipo</button>
        </div>
        <!--Tabla-->
        <div class="row">
            <div class="col">
                <div class="tabla mt-2">
                    <table id="tablaTipoEquipo" class="table table-striped dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Equipo</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Modelo</th>
                                <th scope="col">No. serie</th>
                                <th scope="col">Tipo de equipo</th>
                                <th scope="col">Convenio</th>
                                <th scope="col">Costo</th>
                                <th scope="col">Proveedor</th>
                                <th scope="col">Descripción</th>
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
                                <label for="" class="fw-semibold">Marca</label>
                                <input type="text" class="form-control" aria-label="marca" id="inputMarca" name="inputMarca">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Modelo</label>
                                <input type="text" class="form-control" aria-label="modelo" id="inputModelo" name="inputModelo">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="" class="fw-semibold">No. serie</label>
                                <input type="text" class="form-control" aria-label="no. serie" id="inputSerie" name="inputSerie">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Tipo de equipo</label>
                                <input type="text" class="form-control" aria-label="tipo equipo" id="inputTipoEquipo" name="inputTipoEquipo">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Tipo de convenio</label>
                                <input type="text" class="form-control" aria-label="tipo convenio" id="inputTipoConvenio" name="inputTipoConvenio">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="" class="fw-semibold">Costo</label>
                                <input type="text" class="form-control" aria-label="costo" id="inputCosto" name="inputCosto">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Proveedor</label>
                                <input type="text" class="form-control" aria-label="proveedor" id="inputProveedor" name="inputProveedor">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Descripción</label>
                                <input type="text" class="form-control" aria-label="descripcion" id="inputDesc" name="inputDesc">
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
                                <label for="" class="fw-semibold">Marca</label>
                                <input type="text" class="form-control" aria-label="marca" id="editarMarca" name="editarMarca">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Modelo</label>
                                <input type="text" class="form-control" aria-label="modelo" id="editarModelo" name="editarModelo">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="" class="fw-semibold">No. serie</label>
                                <input type="text" class="form-control" aria-label="no. serie" id="editarSerie" name="editarSerie">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Tipo de equipo</label>
                                <input type="text" class="form-control" aria-label="tipo equipo" id="editarTipoEquipo" name="editarTipoEquipo">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Tipo de convenio</label>
                                <input type="text" class="form-control" aria-label="tipo convenio" id="editarTipoConvenio" name="editarTipoConvenio">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="" class="fw-semibold">Costo</label>
                                <input type="text" class="form-control" aria-label="costo" id="editarCosto" name="editarCosto">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Proveedor</label>
                                <input type="text" class="form-control" aria-label="proveedor" id="editarProveedor" name="editarProveedor">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Descripción</label>
                                <input type="text" class="form-control" aria-label="descripcion" id="editarDesc" name="editarDesc">
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
        //Mostrar usuarios
        $(document).ready(function() {
            $('#tablaTipoEquipo').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-MX.json',
                },
            })
        })
    </script>
</body>

</html>