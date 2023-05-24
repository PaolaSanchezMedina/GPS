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
            <h2>Equipos</h2>
            <button type="button" class="btn btn-light text-primary fw-semibold" data-bs-toggle="modal" data-bs-target="#modal_equipo">Nuevo equipo</button>
        </div>
        <!--Tabla-->
        <div class="row">
            <div class="col">
                <div class="tabla mt-2">
                    <table id="tablaEquipos" class="table table-striped dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Marca</th>
                                <th scope="col">No. Serie</th>
                                <th scope="col">Modelo</th>
                                <th scope="col">OS</th>
                                <th scope="col">CPU</th>
                                <th scope="col">Tipo RAM</th>
                                <th scope="col">Capacidad RAM</th>
                                <th scope="col">Tipo disco duro</th>
                                <th scope="col">Capacidad disco duro</th>
                                <th scope="col">Departamento</th>
                                <th scope="col">Velocidad CPU</th>
                                <th scope="col">Cores</th>
                                <th scope="col">Velocidad RAM</th>
                                <th scope="col">MDFoIDF</th>
                                <th scope="col">No. AFE</th>
                                <th scope="col">AFE</th>
                                <th scope="col">Proveedor</th>
                                <th scope="col">No. Factura</th>
                                <th scope="col">Fecha compra</th>
                                <th scope="col">Comentarios</th>
                                <th scope="col">Propiedad</th>
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
    <div class="modal fade modal-xl mt-5" id="modal_equipo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <label for="" class="fw-semibold">Tipo</label>
                                <select class="form-control" id="inputTipo" name="inputTipo">
                                    <?php
                                    include('../../database/conexion.php');
                                    $sql = "SELECT * FROM tipo_equipo";
                                    $resultado = mysqli_query($con, $sql);
                                    if (mysqli_num_rows($resultado) > 0) {
                                        while ($row = mysqli_fetch_assoc($resultado)) {
                                            $idTipoEquipo = $row["id_tipoEquipo"];
                                            $nom_tipoEquipo = $row["nom_tipoEquipo"];
                                            echo "<option value=\"$idTipoEquipo\">$nom_tipoEquipo</option>";
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
                                <label for="" class="fw-semibold">Marca</label>
                                <select class="form-control" id="inputMarca" name="inputMarca">
                                    <?php
                                    include('../../database/conexion.php');
                                    $sql = "SELECT * FROM marca";
                                    $resultado = mysqli_query($con, $sql);
                                    if (mysqli_num_rows($resultado) > 0) {
                                        while ($row = mysqli_fetch_assoc($resultado)) {
                                            $id_marca = $row["id_marca"];
                                            $nom_marca = $row["nom_marca"];
                                            echo "<option value=\"$id_marca\">$nom_marca</option>";
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
                                <label for="" class="fw-semibold">Número de serie</label>
                                <input type="text" class="form-control" id="inputSerie" name="inputSerie">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Descripción</label>
                                <input type="text" class="form-control" id="inputDesc" name="inputDesc">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="" class="fw-semibold">Modelo</label>
                                <input type="text" class="form-control" id="inputModelo" name="inputModelo">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">SO</label>
                                <input type="text" class="form-control" id="inputSO" name="inputSO">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">CPU</label>
                                <input type="text" class="form-control" id="inputCPU" name="inputCPU">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Velocidad del CPU</label>
                                <input type="text" class="form-control" id="inputVelCPU" name="inputVelCPU">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="" class="fw-semibold">Número de cores</label>
                                <input type="text" class="form-control" id="inputCores" name="inputCores">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Tipo de RAM</label>
                                <input type="text" class="form-control" id="inputRAM" name="inputRAM">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Velocidad de RAM</label>
                                <input type="text" class="form-control" id="inputVelRAM" name="inputVelRAM">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Capacidad de RAM</label>
                                <input type="text" class="form-control" id="inputCapRAM" name="inputCapRAM">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="" class="fw-semibold">Tipo de disco duro</label>
                                <input type="text" class="form-control" id="inputDD" name="inputDD">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Capacidad de disco duro</label>
                                <input type="text" class="form-control" id="inputCapDD" name="inputCapDD">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">MDFoIDF</label>
                                <input type="text" class="form-control" id="inputMDFoIDF" name="inputMDFoIDF">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">AFE</label>
                                <input type="text" class="form-control" id="inputAFE" name="inputAFE">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="" class="fw-semibold">Partida AFE</label>
                                <input type="text" class="form-control" id="inputPartAFE" name="inputPartAFE">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Proveedor</label>
                                <select class="form-control" id="inputProv" name="inputProv">
                                    <?php
                                    include('../../database/conexion.php');
                                    $sql = "SELECT * FROM proveedor";
                                    $resultado = mysqli_query($con, $sql);
                                    if (mysqli_num_rows($resultado) > 0) {
                                        while ($row = mysqli_fetch_assoc($resultado)) {
                                            $id_proveedor = $row["id_proveedor"];
                                            $nom_proveedor = $row["nom_proveedor"];
                                            echo "<option value=\"$id_proveedor\">$nom_proveedor</option>";
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
                                <label for="" class="fw-semibold">Número de factura</label>
                                <input type="text" class="form-control" id="inputFact" name="inputFact">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Fecha de compra</label>
                                <input type="date" class="form-control" id="inputFechaCompra" name="inputFechaCompra">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <label for="" class="fw-semibold">Departamento</label>
                                <select class="form-control" id="inputDept" name="inputDept">
                                    <?php
                                    include('../../database/conexion.php');
                                    $sql = "SELECT * FROM departamento";
                                    $resultado = mysqli_query($con, $sql);
                                    if (mysqli_num_rows($resultado) > 0) {
                                        while ($row = mysqli_fetch_assoc($resultado)) {
                                            $id_departamento = $row["id_departamento"];
                                            $nom_departamento = $row["nom_departamento"];
                                            echo "<option value=\"$id_departamento\">$nom_departamento</option>";
                                        }
                                    } else {
                                        echo 'No se encontraron resultados.';
                                    }
                                    mysqli_free_result($resultado);
                                    mysqli_close($con);
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label for="" class="fw-semibold">Comentarios</label>
                                <input type="text" class="form-control" id="inputComent" name="inputComent">
                            </div>
                            <div class="col-lg-3">
                                <label for="" class="fw-semibold">Tipo de propiedad</label>
                                <select class="form-control" id="inputPropiedad" name="inputPropiedad">
                                    <?php
                                    include('../../database/conexion.php');
                                    $sql = "SELECT * FROM tipo_propiedad";
                                    $resultado = mysqli_query($con, $sql);
                                    if (mysqli_num_rows($resultado) > 0) {
                                        while ($row = mysqli_fetch_assoc($resultado)) {
                                            $id_tipoPropiedad = $row["id_tipoPropiedad"];
                                            $nom_tipoPropiedad = $row["nom_tipoPropiedad"];
                                            echo "<option value=\"$id_tipoPropiedad\">$nom_tipoPropiedad</option>";
                                        }
                                    } else {
                                        echo 'No se encontraron resultados.';
                                    }
                                    mysqli_free_result($resultado);
                                    mysqli_close($con);
                                    ?>
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
    <!--Pantalla modal para editar a un equipo-->
    <div class="modal fade modal-xl mt-5" id="modal_editar_equipo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <label for="" class="fw-semibold">Tipo</label>
                                <select class="form-control" id="editTipo" name="editTipo">
                                    <?php
                                    include('../../database/conexion.php');
                                    $sql = "SELECT * FROM tipo_equipo";
                                    $resultado = mysqli_query($con, $sql);
                                    if (mysqli_num_rows($resultado) > 0) {
                                        while ($row = mysqli_fetch_assoc($resultado)) {
                                            $idTipoEquipo = $row["id_tipoEquipo"];
                                            $nom_tipoEquipo = $row["nom_tipoEquipo"];
                                            echo "<option value=\"$idTipoEquipo\">$nom_tipoEquipo</option>";
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
                                <label for="" class="fw-semibold">Marca</label>
                                <select class="form-control" id="editMarca" name="editMarca">
                                    <?php
                                    include('../../database/conexion.php');
                                    $sql = "SELECT * FROM marca";
                                    $resultado = mysqli_query($con, $sql);
                                    if (mysqli_num_rows($resultado) > 0) {
                                        while ($row = mysqli_fetch_assoc($resultado)) {
                                            $id_marca = $row["id_marca"];
                                            $nom_marca = $row["nom_marca"];
                                            echo "<option value=\"$id_marca\">$nom_marca</option>";
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
                                <label for="" class="fw-semibold">Número de serie</label>
                                <input type="text" class="form-control" id="editSerie" name="editSerie">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Descripción</label>
                                <input type="text" class="form-control" id="editDesc" name="editDesc">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="" class="fw-semibold">Modelo</label>
                                <input type="text" class="form-control" id="editModelo" name="editModelo">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">SO</label>
                                <input type="text" class="form-control" id="editSO" name="editSO">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">CPU</label>
                                <input type="text" class="form-control" id="editCPU" name="editCPU">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Velocidad del CPU</label>
                                <input type="text" class="form-control" id="editVelCPU" name="editVelCPU">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="" class="fw-semibold">Número de cores</label>
                                <input type="text" class="form-control" id="editCores" name="editCores">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Tipo de RAM</label>
                                <input type="text" class="form-control" id="editRAM" name="editRAM">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Velocidad de RAM</label>
                                <input type="text" class="form-control" id="editVelRAM" name="editVelRAM">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Capacidad de RAM</label>
                                <input type="text" class="form-control" id="editCapRAM" name="editCapRAM">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="" class="fw-semibold">Tipo de disco duro</label>
                                <input type="text" class="form-control" id="editDD" name="editDD">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Capacidad de disco duro</label>
                                <input type="text" class="form-control" id="editCapDD" name="editCapDD">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">MDFoIDF</label>
                                <input type="text" class="form-control" id="editMDFoIDF" name="editMDFoIDF">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">AFE</label>
                                <input type="text" class="form-control" id="editAFE" name="editAFE">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="" class="fw-semibold">Partida AFE</label>
                                <input type="text" class="form-control" id="editPartAFE" name="editPartAFE">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Proveedor</label>
                                <select class="form-control" id="editProv" name="editProv">
                                    <?php
                                    include('../../database/conexion.php');
                                    $sql = "SELECT * FROM proveedor";
                                    $resultado = mysqli_query($con, $sql);
                                    if (mysqli_num_rows($resultado) > 0) {
                                        while ($row = mysqli_fetch_assoc($resultado)) {
                                            $id_proveedor = $row["id_proveedor"];
                                            $nom_proveedor = $row["nom_proveedor"];
                                            echo "<option value=\"$id_proveedor\">$nom_proveedor</option>";
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
                                <label for="" class="fw-semibold">Número de factura</label>
                                <input type="text" class="form-control" id="editFact" name="editFact">
                            </div>
                            <div class="col">
                                <label for="" class="fw-semibold">Fecha de compra</label>
                                <input type="date" class="form-control" id="editFechaCompra" name="editFechaCompra">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <label for="" class="fw-semibold">Departamento</label>
                                <select class="form-control" id="editDept" name="editDept">
                                    <?php
                                    include('../../database/conexion.php');
                                    $sql = "SELECT * FROM departamento";
                                    $resultado = mysqli_query($con, $sql);
                                    if (mysqli_num_rows($resultado) > 0) {
                                        while ($row = mysqli_fetch_assoc($resultado)) {
                                            $id_departamento = $row["id_departamento"];
                                            $nom_departamento = $row["nom_departamento"];
                                            echo "<option value=\"$id_departamento\">$nom_departamento</option>";
                                        }
                                    } else {
                                        echo 'No se encontraron resultados.';
                                    }
                                    mysqli_free_result($resultado);
                                    mysqli_close($con);
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label for="" class="fw-semibold">Comentarios</label>
                                <input type="text" class="form-control" id="editComent" name="editComent">
                            </div>
                            <div class="col-lg-3">
                                <label for="" class="fw-semibold">Tipo de propiedad</label>
                                <select class="form-control" id="editPropiedad" name="editPropiedad">
                                    <?php
                                    include('../../database/conexion.php');
                                    $sql = "SELECT * FROM tipo_propiedad";
                                    $resultado = mysqli_query($con, $sql);
                                    if (mysqli_num_rows($resultado) > 0) {
                                        while ($row = mysqli_fetch_assoc($resultado)) {
                                            $id_tipoPropiedad = $row["id_tipoPropiedad"];
                                            $nom_tipoPropiedad = $row["nom_tipoPropiedad"];
                                            echo "<option value=\"$id_tipoPropiedad\">$nom_tipoPropiedad</option>";
                                        }
                                    } else {
                                        echo 'No se encontraron resultados.';
                                    }
                                    mysqli_free_result($resultado);
                                    mysqli_close($con);
                                    ?>
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
                    // "aTargets": [23] //Es la columna de opciones
                }, ]
            })
        });
        //==========Agregar Equipo==========
        $(document).on('submit', '#nuevoEquipoForm', function(event) { //Establece un controlador de eventos en el formulario para el evento submit
            event.preventDefault();
            //Se obtienen los valores de los campos
            var id_tipoEquipo = $('#inputTipo').val();
            var id_marca = $('#inputMarca').val();
            var noSerie_equipo = $('#inputSerie').val();
            var descripcion_equipo = $('#inputDesc').val();
            var modelo_equipo = $('#inputModelo').val();
            var OS_equipo = $('#inputSO').val();
            var moldCPU_equipo = $('#inputCPU').val();
            var velocidadCPU_equipo = $('#inputVelCPU').val();
            var noCores_equipo = $('#inputCores').val();
            var tipoMemRAM_equipo = $('#inputRAM').val();
            var velocidadRAM_equipo = $('#inputVelRAM').val();
            var capacidadRAM_equipo = $('#inputCapRAM').val();
            var tipoDiscoDuro_equipo = $('#inputDD').val();
            var capDiscoDuro_equipo = $('#inputCapDD').val();
            var MDFoIDF_equipo = $('#inputMDFoIDF').val();
            var noAFE_equipo = $('#inputAFE').val();
            var noPartidaAFE_equipo = $('#inputPartAFE').val();
            var id_proveedor = $('#inputProv').val();
            var noFactura_equipo = $('#inputFact').val();
            var fechaCompra_equipo = $('#inputFechaCompra').val();
            var id_departamento = $('#inputDept').val();
            var comentarios_equipo = $('#inputComent').val();
            var id_tipoPropiedad = $('#inputPropiedad').val();

            //Verifica que todos los campos esten llenos
            if (id_tipoEquipo != '' && id_marca != '' && noSerie_equipo != '' && descripcion_equipo != '' && modelo_equipo != '' && OS_equipo != '' && moldCPU_equipo != '' && velocidadCPU_equipo != '' && noCores_equipo != '' && tipoMemRAM_equipo != '' && velocidadRAM_equipo != '' && capacidadRAM_equipo != '' && tipoDiscoDuro_equipo != '' && capDiscoDuro_equipo != '' && MDFoIDF_equipo != '' && noAFE_equipo != '' && noPartidaAFE_equipo != '' && id_proveedor != '' && noFactura_equipo != '' && fechaCompra_equipo != '' && id_departamento != '' && comentarios_equipo != '' && id_tipoPropiedad != '') {
                $.ajax({ //Petición ajax para agregar
                    url: "../../database/crud-equipo/agregar-equipo.php",
                    data: {
                        id_tipoEquipo: id_tipoEquipo,
                        id_marca: id_marca,
                        noSerie_equipo: noSerie_equipo,
                        descripcion_equipo: descripcion_equipo,
                        modelo_equipo: modelo_equipo,
                        OS_equipo: OS_equipo,
                        moldCPU_equipo: moldCPU_equipo,
                        velocidadCPU_equipo: velocidadCPU_equipo,
                        noCores_equipo: noCores_equipo,
                        tipoMemRAM_equipo: tipoMemRAM_equipo,
                        velocidadRAM_equipo: velocidadRAM_equipo,
                        capacidadRAM_equipo: capacidadRAM_equipo,
                        tipoDiscoDuro_equipo: tipoDiscoDuro_equipo,
                        capDiscoDuro_equipo: capDiscoDuro_equipo,
                        MDFoIDF_equipo: MDFoIDF_equipo,
                        noAFE_equipo: noAFE_equipo,
                        noPartidaAFE_equipo: noPartidaAFE_equipo,
                        id_proveedor: id_proveedor,
                        noFactura_equipo: noFactura_equipo,
                        fechaCompra_equipo: fechaCompra_equipo,
                        id_departamento: id_departamento,
                        comentarios_equipo: comentarios_equipo,
                        id_tipoPropiedad: id_tipoPropiedad
                    },
                    type: 'post',
                    success: function(data) { //Vuelve a dibujar la tabla y oculta el modal
                        var json = JSON.parse(data);
                        status = json.status;
                        if (status == 'success') {
                            table = $('#tablaEquipo').DataTable();
                            table.draw();
                            $('#modal_equipo').modal('hide');
                            // Restablecer los campos del formulario
                            $('#nuevoEquipoForm')[0].reset();
                        }
                    }
                })
            } else {
                alert("Favor de llenar todos los campos")
            }
        });
        // //==========Actualizar Proovedor==========
        $(document).on('submit', '#editarEquipoForm', function(e) { //Establece un controlador de eventos en el formulario para el evento submit
            e.preventDefault();
            //Se obtienen los valores de los campos
            var id_tipoEquipo = $('#editTipo').val();
            var id_marca = $('#editMarca').val();
            var noSerie_equipo = $('#editSerie').val();
            var descripcion_equipo = $('#editDesc').val();
            var modelo_equipo = $('#editModelo').val();
            var OS_equipo = $('#editSO').val();
            var moldCPU_equipo = $('#editCPU').val();
            var velocidadCPU_equipo = $('#editVelCPU').val();
            var noCores_equipo = $('#editCores').val();
            var tipoMemRAM_equipo = $('#editRAM').val();
            var velocidadRAM_equipo = $('#editVelRAM').val();
            var capacidadRAM_equipo = $('#editCapRAM').val();
            var tipoDiscoDuro_equipo = $('#editDD').val();
            var capDiscoDuro_equipo = $('#editCapDD').val();
            var MDFoIDF_equipo = $('#editMDFoIDF').val();
            var noAFE_equipo = $('#editAFE').val();
            var noPartidaAFE_equipo = $('#editPartAFE').val();
            var id_proveedor = $('#editProv').val();
            var noFactura_equipo = $('#editFact').val();
            var fechaCompra_equipo = $('#editFechaCompra').val();
            var id_departamento = $('#editDept').val();
            var comentarios_equipo = $('#editComent').val();
            var id_tipoPropiedad = $('#editPropiedad').val();
            var trid = $('#id_equipo').val();
            var id_equipo = $('#id_equipo').val();
            console.log(trid);
            console.log(id_equipo);
            //Verifica que todos los campos esten llenos
            if (id_tipoEquipo != '' && id_marca != '' && noSerie_equipo != '' && descripcion_equipo != '' && modelo_equipo != '' && OS_equipo != '' && moldCPU_equipo != '' && velocidadCPU_equipo != '' && noCores_equipo != '' && tipoMemRAM_equipo != '' && velocidadRAM_equipo != '' && capacidadRAM_equipo != '' && tipoDiscoDuro_equipo != '' && capDiscoDuro_equipo != '' && MDFoIDF_equipo != '' && noAFE_equipo != '' && noPartidaAFE_equipo != '' && id_proveedor != '' && noFactura_equipo != '' && fechaCompra_equipo != '' && id_departamento != '' && comentarios_equipo != '' && id_tipoPropiedad != '') {
                $.ajax({ //Petición ajax para actualizar
                    url: "../../database/crud-equipo/actualizar-equipo.php",
                    type: "post",
                    data: {
                        id_tipoEquipo: id_tipoEquipo,
                        id_marca: id_marca,
                        noSerie_equipo: noSerie_equipo,
                        descripcion_equipo: descripcion_equipo,
                        modelo_equipo: modelo_equipo,
                        OS_equipo: OS_equipo,
                        moldCPU_equipo: moldCPU_equipo,
                        velocidadCPU_equipo: velocidadCPU_equipo,
                        noCores_equipo: noCores_equipo,
                        tipoMemRAM_equipo: tipoMemRAM_equipo,
                        velocidadRAM_equipo: velocidadRAM_equipo,
                        capacidadRAM_equipo: capacidadRAM_equipo,
                        tipoDiscoDuro_equipo: tipoDiscoDuro_equipo,
                        capDiscoDuro_equipo: capDiscoDuro_equipo,
                        MDFoIDF_equipo: MDFoIDF_equipo,
                        noAFE_equipo: noAFE_equipo,
                        noPartidaAFE_equipo: noPartidaAFE_equipo,
                        id_proveedor: id_proveedor,
                        noFactura_equipo: noFactura_equipo,
                        fechaCompra_equipo: fechaCompra_equipo,
                        id_departamento: id_departamento,
                        comentarios_equipo: comentarios_equipo,
                        id_tipoPropiedad: id_tipoPropiedad,
                        id_equipo: id_equipo
                    },
                    success: function(data) { //Vuelve a dibujar la tabla y oculta el modal
                        var json = JSON.parse(data);
                        var status = json.status;
                        if (status == 'true') {
                            table = $('#tablaEquipos').DataTable();
                            table.draw();
                            $('#modal_editar_equipo').modal('hide');
                            var button = '<td><a href="javascript:void();" data-id_equipo="' + id_equipo + '" class="btn editbtn"><i role="button" class="fa-solid fa-pen-to-square text-primary"></i></a><a href="javascript:void();"  data-id_equipo="' + id_equipo + '"  class="btn deleteBtn"><i role="button" class="fa-solid fa-trash-can text-danger"></i></a></td>';
                            var row = table.row("[id_equipo='" + trid + "']");
                            row.row("[id_equipo='" + trid + "']").data([id_equipo, id_tipoEquipo, id_marca, noSerie_equipo, descripcion_equipo, modelo_equipo, OS_equipo, moldCPU_equipo, velocidadCPU_equipo, noCores_equipo, tipoMemRAM_equipo, velocidadRAM_equipo, capacidadRAM_equipo, tipoDiscoDuro_equipo, capDiscoDuro_equipo, MDFoIDF_equipo, noAFE_equipo, noPartidaAFE_equipo, id_proveedor, noFactura_equipo, fechaCompra_equipo, id_departamento, comentarios_equipo, id_tipoPropiedad, button]);
                        } else {
                            alert('Failed');
                        }
                    }
                });
            } else {
                alert('Llenar todos los campos');
            }
        });
        // //==========Editar Equipo==========
        $('#tablaEquipos').on('click', '.editbtn ', function(event) { //Abre el modal de editar
            var table = $('#tablaEquipos').DataTable(); //Se inicializa la tabla mediante el uso del plugin jQuery DataTables
            var trid = $(this).closest('tr').attr('id_equipo'); //Se está obteniendo el ID que se va a editar. Esto se hace a través del uso de la función closest() que busca el elemento padre más cercano que tenga la etiqueta <tr>
            var id_equipo = $(this).data('id_equipo'); //Se está obteniendo el ID de la fila correspondiente al botón de edición al utilizar la función "data" que lee el valor del atributo "data-id" en el botón.
            console.log(trid);
            console.log(id_equipo);
            $('#modal_editar_equipo').modal('show');
            $.ajax({ //Petición ajax para editar
                url: "../../database/crud-equipo/editar-equipo.php",
                data: {
                    id_equipo: id_equipo
                },
                type: 'post',
                success: function(data) {
                    var json = JSON.parse(data);
                    $('#editTipo').val(json.id_tipoEquipo);
                    $('#editMarca').val(json.id_marca);
                    $('#editSerie').val(json.noSerie_equipo);
                    $('#editDesc').val(json.descripcion_equipo);
                    $('#editModelo').val(json.modelo_equipo);
                    $('#editSO').val(json.OS_equipo);
                    $('#editCPU').val(json.moldCPU_equipo);
                    $('#editVelCPU').val(json.velocidadCPU_equipo);
                    $('#editCores').val(json.noCores_equipo);
                    $('#editRAM').val(json.tipoMemRAM_equipo);
                    $('#editVelRAM').val(json.velocidadRAM_equipo);
                    $('#editCapRAM').val(json.capacidadRAM_equipo);
                    $('#editDD').val(json.tipoDiscoDuro_equipo);
                    $('#editCapDD').val(json.capDiscoDuro_equipo);
                    $('#editMDFoIDF').val(json.MDFoIDF_equipo);
                    $('#editAFE').val(json.noAFE_equipo);
                    $('#editPartAFE').val(json.noPartidaAFE_equipo);
                    $('#editProv').val(json.id_proveedor);
                    $('#editFact').val(json.noFactura_equipo);
                    $('#editFechaCompra').val(json.fechaCompra_equipo);
                    $('#editDept').val(json.id_departamento);
                    $('#editComent').val(json.comentarios_equipo);
                    $('#editPropiedad').val(json.id_tipoPropiedad);
                    $('#id_equipo').val(id_equipo);
                    $('#trid_equipo').val(trid);
                }
            })
        });
        // //==========Eliminar Proovedor==========
        $(document).on('click', '.deleteBtn', function(event) { //Se abre una alerta para eliminar
            var table = $('#tablaEquipos').DataTable();
            event.preventDefault();
            var id_equipo = $(this).data('id_equipo'); //Se está obteniendo el ID de la fila correspondiente al botón de edición al utilizar la función "data" que lee el valor del atributo "data-id" en el botón.
            if (confirm("¿Eliminar proovedor definitivamente?")) {
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