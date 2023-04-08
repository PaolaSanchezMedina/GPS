<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Hoja de estilos css-->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!--Icono de la página-->
    <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon">
    <!--Bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>SiCEI</title>
</head>
<body>
  <!--ENCABEZADO DE PÁGINA-->
  <nav class="navbar">
    <div class="container-fluid">
      <a class="navbar-brand text-light fs-2 fw-semibold ms-3" href="../models/login.php">
        <img src="../assets/img/logo.png" alt="Logo" width="40" height="38" class="d-inline-block align-text-bottom mt-1">
        SiCEI
      </a>
      <form class="d-flex" action="../models/index.php">
        <button class="btn text-light rounded-4 fs-5 fw-semibold me-3 mt-2" type="submit">Volver</button>
      </form>
    </div>
  </nav>
  <!--CUERPO DE PÁGINA-->
  <section id="log">
      <div class="form-box mt-4">
          <div class="form-value">
              <form method="post" action="" class="text-center">
                  <img src="../assets/img/logo.png" class="rounded" alt="Logo" width="40" height="38">
                  <h4 class="mt-3" style="color: white; text-align: center;">Iniciar sesión</h4>
                  <?php
                  include "../database/conexion.php";
                  include "../database/controlador-login.php";
                  ?>
                  <div class="inputbox">
                      <img src="../assets/img/user.png" alt="">
                      <!--Input del usuario-->
                      <input type="text" required id="" name="usuario">
                      <label for="">Usuario</label>
                  </div>
                  <div class="inputbox">
                    <img src="../assets/img/pass.png" alt="">
                    <!--Input de la contraseña-->
                      <input type="password" required  id="" name="contrasena">
                      <label for="">Contraseña</label>
                  </div>
                  <input name="btnIniciar" class="btn text-light fw-semibold" type="submit" value="Iniciar Sesión"></input>
              </form>
          </div>
      </div>
  </section>
  <!--PIE DE PÁGINA-->
  <footer class="">
    <p>&copy; SiCEI 2023</p>
  </footer>
  <!--Bootstrap 5-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>