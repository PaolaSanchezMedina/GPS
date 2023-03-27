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
    <!--Script para obtener fecha y hora actual-->
    <script src="../../assets/js/fecha-hora.js"></script>
    <title>SiCEI</title>
</head>

<body>
    <!--ENCABEZADO DE PÁGINA-->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand text-light fs-2 fw-semibold ms-3" href=../colaborador/inicio-colaborador.php>
                <img src="../../assets/img/logo.png" alt="Logo" width="40" height="38" class="d-inline-block align-text-bottom mt-1">
                SiCEI
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-current="page" href="../colaborador/inicio-colaborador.php">Mi perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-current="page" href="../colaborador/equipos-colaborador.php">Mis equipos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-current="page" href=../colaborador/prestamos-colaborador.php>Solicitar préstamo</a>
                    </li>
                </ul>
            </div>
            <form class="d-flex" action="../../models/login.php">
                <button class="btn border-white text-light rounded-4 fs-5 fw-semibold me-3 mt-2" type="submit">Cerrar sesión</button>
            </form>
        </div>
    </nav>
    <!--CUERPO DE PÁGINA-->
    <div class="container fluid">
        <h2 class="text-light mt-5">Información</h2>
        <div class="row">
            <div class="container">
                <div class="row text-light">
                    <div class="row">
                        <div class="row">
                            <label for="" class="fw-semibold mt-1">Nombre</label>
                        </div>
                        <div class="row">
                            <label for="" class="fw-semibold mt-3">Tipo de usuario</label>
                        </div>
                        <div class="row">
                            <label for="" class="fw-semibold mt-3">Domicilio</label>
                        </div>
                        <div class="row">
                            <label for="" class="fw-semibold mt-3">Contacto</label>
                        </div>
                        <div class="row">
                            <label for="" class="fw-semibold mt-3">Email</label>
                        </div>
                        <div class="row">
                            <label for="" class="fw-semibold mt-3">Centro de costos</label>
                        </div>
                        <div class="row">
                            <label for="" class="fw-semibold mt-3">Localidad</label>
                        </div>
                        <div class="row">
                            <label for="" class="fw-semibold mt-3">Jefatura</label>
                        </div>
                    </div>
                    <form action="">
                        <button class="btn border-white text-light rounded-4 fw-semibold mt-4" type="submit">Editar Información</button>
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
</body>

</html>