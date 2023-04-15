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
            <a class="navbar-brand text-light fs-2 fw-semibold ms-3" href=../super/inicio-supervisor.php>
                <img src="../../assets/img/logo.png" alt="Logo" width="40" height="38" class="d-inline-block align-text-bottom mt-1">
                SiCEI
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-current="page" href="../super/inicio-supervisor.php">Mi perfil</a>
                    </li>
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
            <h2>Asignar equipo</h2>
        </div>
        <section id="log">
            <form class="formularioAsignar mt-2" action="">
                <div class="row mt-3 ms-2 me-2">
                    <div class="col-lg-2">
                        <label for="" class="fw-semibold">Id colaborador</label>
                        <input type="text" class="form-control" aria-label="id colaborador" id="" name="">
                    </div>
                    <div class="col">
                        <label for="" class="fw-semibold">Nombre</label>
                        <input type="text" class="form-control" aria-label="nombre" id="" name="">
                    </div>
                    <div class="col">
                        <label for="" class="fw-semibold">1er Apellido</label>
                        <input type="text" class="form-control" aria-label="1er apellido" id="" name="">
                    </div>
                    <div class="col">
                        <label for="" class="fw-semibold">2do Apellido</label>
                        <input type="text" class="form-control" aria-label="2do apellido" id="" name="">
                    </div>
                </div>
                <div class="row mt-2 ms-2 me-2">
                    <div class="col-lg-2">
                        <label for="" class="fw-semibold">Id equipo</label>
                        <input type="text" class="form-control" aria-label="id equipo" id="" name="">
                    </div>
                    <div class="col">
                        <label for="" class="fw-semibold">Equipo</label>
                        <input type="text" class="form-control" aria-label="equipo" id="" name="">
                    </div>
                    <div class="col">
                        <label for="" class="fw-semibold">Marca</label>
                        <input type="text" class="form-control" aria-label="marca" id="" name="">
                    </div>
                    <div class="col">
                        <label for="" class="fw-semibold">Modelo</label>
                        <input type="text" class="form-control" aria-label="modelo" id="" name="">
                    </div>
                </div>
                <div class="row mt-2 ms-2 me-2">
                    <div class="col-lg-4">
                        <label for="" class="fw-semibold">No. Serie</label>
                        <input type="text" class="form-control" aria-label="no serie" id="" name="">
                    </div>
                    <div class="col-lg-4">
                        <label for="" class="fw-semibold">Estado del préstamo</label>
                        <input type="text" class="form-control" aria-label="estado" id="" name="">
                    </div>
                    <div class="col">
                        <label for="" class="fw-semibold">Fecha</label>
                        <p id="fecha" class="form-control"></p>
                    </div>
                </div>
                <div class="row mt-2 ms-2 me-2">
                    <div class="col">
                        <label for="" class="fw-semibold">Localidad</label>
                        <input type="text" class="form-control" aria-label="localidad" id="" name="">
                    </div>
                    <div class="col">
                        <label for="" class="fw-semibold">Complejo</label>
                        <input type="text" class="form-control" aria-label="complejo" id="" name="">
                    </div>
                    <div class="col">
                        <label for="" class="fw-semibold">Departamento</label>
                        <input type="text" class="form-control" aria-label="departamento" id="" name="">
                    </div>
                </div>
                <div class="row ms-2 me-2">
                    <div class="col">
                        <label for="" class="fw-semibold">Observaciones</label>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="" id="floatingTextarea2" style="height: 100px; max-height: 100px;"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row mt-2 ms-2 me-2 text-end">
                    <div class="col">
                        <button type="button" class="btn btn-light text-primary fw-semibold">Aceptar</button>
                    </div>
                </div>
            </form>
        </section>
        <div class="d-flex justify-content-between text-light mt-5">
            <h2>Préstamos</h2>
        </div>
        <!--Tabla-->
        <div class="row">
            <div class="col">
                <div class="tabla mt-2">
                    <table id="tablaPrestamos" class="table table-striped dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">Id préstamo</th>
                                <th scope="col">Id colaborador</th>
                                <th scope="col">Id equipo</th>
                                <th scope="col">Identificador</th>
                                <th scope="col">Fecha entrega</th>
                                <th scope="col">Id usuario</th>
                                <th scope="col">Observaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
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
    <!--========================================SCRIPT PARA FECHA========================================-->
    <script>
        function mostrarFecha() {
            var fecha = new Date();
            var dia = fecha.getDate();
            var mes = fecha.getMonth() + 1;
            var anio = fecha.getFullYear();
            if (mes < 10) {
                mes = "0" + mes;
            }
            if (dia < 10) {
                dia = "0" + dia;
            }
            var fechaCompleta = anio + '-' + mes + '-' + dia;
            document.getElementById('fecha').innerHTML = fechaCompleta;
        }
        mostrarFecha();
    </script>
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
                    "bSortable": false, //La columna 7 de la tabla no se puede ordenar
                    //"aTargets": [9] //Es la columna de opciones
                }, ]
            })
        })
    </script>
</body>

</html>