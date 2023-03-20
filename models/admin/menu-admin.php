<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Hoja de estilos css-->
    <link rel="stylesheet" href=../../assets/style.css>
    <!--Icono de la página-->
    <link rel="shortcut icon" href="../../assets/img/logo.png" type="image/x-icon">
    <!--Bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>SiCEI</title>
</head>
<body>
  <!--ENCABEZADO DE PÁGINA-->
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand text-light fs-2 fw-semibold ms-3" href=../../models/admin/menu-admin.php>
        <img src="../../assets/img/logo.png" alt="Logo" width="40" height="38" class="d-inline-block align-text-bottom mt-1">
        SiCEI
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-light" aria-current="page" href=../../models/admin/menu-admin.php>Mi perfil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" aria-current="page" href="#">Asignar equipos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" aria-current="page" href=../../models/admin/usuarios.php>Usuarios</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Catálogos
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Tipos de equipos</a></li>
              <li><a class="dropdown-item" href="#">Proveedores</a></li>
              <li><a class="dropdown-item" href="#">Accesorios</a></li>
              <li><a class="dropdown-item" href="#">Localidades</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--CUERPO DE PÁGINA-->
  <!--PIE DE PÁGINA-->
  <footer class="">
    <p>&copy; SiCEI 2023</p>
  </footer>
  <!--Bootstrap 5-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>