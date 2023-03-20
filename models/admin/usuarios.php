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
    <!--Font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Data table-->
    <link href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
    <title>SiCEI</title>
</head>
<body>
  <!--ENCABEZADO DE PÁGINA-->
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand text-light fs-2 fw-semibold ms-3" href=../../models/admin/usuarios.php>
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
  <div class="container mt-5">
    <h2 class="text-light text-center mb-2">Usuarios</h2>
    <form class="d-flex justify-content-end" action="#">
        <button class="btn text-primary rounded-4 fw-semibold bg-light mb-2" type="submit">Nuevo</button>
      </form>
    <div class="row">
      <div class="col">
        <table id="tabla_usuarios" class="table table-hover text-light">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Nombre</th>
              <th scope="col">1er Apellido</th>
              <th scope="col">2do Apellido</th>
              <th scope="col">Usuario</th>
              <th scope="col">Contraseña</th>
              <th scope="col">Tipo</th>
              <th scope="col">Acción</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Gabriela</td>
              <td>Santana</td>
              <td>Ramírez</td>
              <td>GabyRamirez</td>
              <td>0123</td>
              <td>2</td>
              <td>
                <a href="#"><i role="button" class="fa-solid fa-user-pen text-info ms-1 me-2"></i></a>
                <a href="#"><i role="button" class="fa-solid fa-user-xmark text-danger"></i></a>
              </td>
            </tr>
            <tr>
              <td>1</td>
              <td>Gabriela</td>
              <td>Santana</td>
              <td>Ramírez</td>
              <td>GabyRamirez</td>
              <td>0123</td>
              <td>2</td>
              <td>
                <a href="#"><i role="button" class="fa-solid fa-user-pen text-info ms-1 me-2"></i></a>
                <a href="#"><i role="button" class="fa-solid fa-user-xmark text-danger"></i></a>
              </td>
            </tr>
            <tr>
              <td>1</td>
              <td>Gabriela</td>
              <td>Santana</td>
              <td>Ramírez</td>
              <td>GabyRamirez</td>
              <td>0123</td>
              <td>2</td>
              <td>
                <a href="#"><i role="button" class="fa-solid fa-user-pen text-info ms-1 me-2"></i></a>
                <a href="#"><i role="button" class="fa-solid fa-user-xmark text-danger"></i></a>
              </td>
            </tr>
            <tr>
              <td>1</td>
              <td>Gabriela</td>
              <td>Santana</td>
              <td>Ramírez</td>
              <td>GabyRamirez</td>
              <td>0123</td>
              <td>2</td>
              <td>
                <a href="#"><i role="button" class="fa-solid fa-user-pen text-info ms-1 me-2"></i></a>
                <a href="#"><i role="button" class="fa-solid fa-user-xmark text-danger"></i></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  
  <!--PIE DE PÁGINA-->
  <footer class="">
    <p>&copy; SiCEI 2023</p>
  </footer>
  <!--jQuery-->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
  <!--Data table-->
  <script src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.4/datatables.min.js"></script>
  <!--Bootstrap 5-->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  <!--jQuery-->
  <script type="text/javascript">
      $('#tabla_usuarios').DataTable({});
    </script>
</body>
</html>

<!--
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../../assets/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href=../../assets/style.css>
    <link href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
    <title>SiCEI</title>
  </head>
  <body>
      <div class="encabezado">
        <nav class="navbar navbar-expand-lg pt-1">
          <div class="container-fluid">
            <a class="navbar-brand text-light fs-3 fw-bold " href=../../models/admin/menu-admin.php>
              <img src="../../assets/img/logo.png" alt="Logo" width="40" height="38" class="d-inline-block align-text-bottom mt-2">
              SiCEI
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mt-1 mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link text-light ps-2 me-2 mt-2" href=../../models/admin/menu-admin.php>
                    Mi perfil</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-light ps-2 me-2 mt-2" href="#">Asignación de equipos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-light ps-2 me-2 mt-2" href=../../models/admin/usuarios.php>Usuarios</a>
                </li>
                <li class="nav-item dropdown mt-2">
                  <a class="nav-link dropdown-toggle text-light ps-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Catalogos
                  </a>
                  <ul class="dropdown-menu bg-light rounded-3">
                    <li><a class="dropdown-item" href="#">Tipos de equipos</a></li>
                    <li><a class="dropdown-item" href="#">Proveedores</a></li>
                    <li><a class="dropdown-item" href="#">Accesorios</a></li>
                    <li><a class="dropdown-item" href="#">Localidades</a></li>
                  </ul>
                </li>
              </ul>
              <form class="d-flex" action="/models/login.html">
                <button class="btn text-light rounded-4 fw-semibold me-3 mt-2" type="submit">Cerrar sesión</button>
              </form>
            </div>
          </div>
        </nav>
      </div>
      <div class="cuerpo">
        <div class="text-light d-flex justify-content-center mt-3">
          <h2>Usuarios</h2>
        </div>
        <div class="container-fluid mt-3">
          <div class="row">
            <div class="container">
              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <table id="tabla_usuarios" class="datatable">
                    <thead class="text-light">
                      <th>Id</th>
                      <th>Nombre</th>
                      <th>Primer apellido</th>
                      <th>Segundo apellido</th>
                      <th>Usuario</th>
                      <th>Contraseña</th>
                      <th>Id tipo</th>
                      <th>Acción</th>
                    </thead>
                    <tbody class="text-light">
                      <tr>
                        <td>1</td>
                        <td>Gabriela</td>
                        <td>Santana</td>
                        <td>Ramirez</td>
                        <td>GabiRamirez</td>
                        <td>0123</td>
                        <td>2</td>
                        <td>
                          <a href="#"><i role="button" class="fa-solid fa-user-pen text-info ms-1 me-2"></i></a>
                          <a href="#"><i role="button" class="fa-solid fa-user-xmark text-danger"></i></a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="pie">
          <p style="color: white">&copy; SiCEI 2023</p>
      </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.4/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $('#tabla_usuarios').DataTable({});
    </script>
  </body>
</html-->