<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Hoja de estilos css-->
    <link rel="stylesheet" href="../../assets/style.css">
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
    <h2>Tipo de equipo</h2>
    <button type="button" class="btn btn-light text-primary fw-semibold" data-bs-toggle="modal" data-bs-target="#modal_usuarios">Nuevo usuario</button>
    </div>
    <!--Tabla-->
    <div class="row">
      <div class="col">
        <div class="tabla mt-2">
          <table id="tablaUsuarios" class="table table-hover">
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
                <td>Supervisor</td>
                <td>
                  <a href="#"><i role="button" class="fa-solid fa-pen-to-square text-info ms-1 me-2"></i></a>
                  <a href="#"><i role="button" class="fa-solid fa-trash text-danger"></i></a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!--Pantalla modal-->
  <div class="modal fade modal-xl mt-5" id="modal_usuarios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo usuario</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="row">
              <div class="col">
                <label for="" class="fw-semibold">Nombre</label>
                <input type="text" class="form-control" aria-label="First name">
              </div>
              <div class="col">
                <label for="" class="fw-semibold">Primer apellido</label>
                  <input type="text" class="form-control" aria-label="Last name">
              </div>
              <div class="col">
                <label for="" class="fw-semibold">Segundo apellido</label>
                  <input type="text" class="form-control" aria-label="Last name">
              </div>
            </div>
            <div class="row mt-3">
              <div class="col">
                <label for="" class="fw-semibold">Usuario</label>
                <input type="text" class="form-control" aria-label="First name">
              </div>
              <div class="col">
                <label for="" class="fw-semibold">Contraseña</label>
                  <input type="text" class="form-control" aria-label="Last name">
              </div>
              <div class="col">
                <label for="" class="fw-semibold">Tipo de usuario</label>
                  <input type="text" class="form-control" aria-label="Last name">
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </div>
  </div>
  <!--PIE DE PÁGINA-->
  <footer class="">
    <div class="d-flex justify-content-between">
      <p id="fecha" class="ms-5"></p>
      <p>&copy; SiCEI 2023</p>
    </div>
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
      $('#tablaUsuarios').DataTable({
        language: {
        url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-MX.json', //Cambia el idioma a español
        },
      });
  </script>
  <!--Script para obtener fecha y hora actual-->
  <script>
    function mostrarFechaHora() {
    var fecha = new Date();
    var dia = fecha.getDate();
    var mes = fecha.getMonth() + 1;
    var anio = fecha.getFullYear();
    var hora = fecha.getHours();
    var minutos = fecha.getMinutes();
    // Formato de la fecha y hora
    var formatoFecha = dia + '/' + mes + '/' + anio;
    var formatoHora = hora + ':' + minutos;
    // Mostrar la fecha y hora en el elemento HTML
    document.getElementById('fecha').innerHTML = 'Fecha: ' + formatoFecha + '   ' + 'Hora: ' + formatoHora;
    // Actualizar la fecha y hora cada segundo
    setTimeout(mostrarFechaHora, 100);
    }
    // Llamamos la función para que se ejecute
    mostrarFechaHora();
  </script>
</body>
</html>