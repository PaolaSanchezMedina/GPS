<?php
session_start();
if (!empty($_POST["btnIniciar"])) {
    if (!empty($_POST["usuario"]) and !empty($_POST["contrasena"])) {
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];

        // Deshabilita los mensajes de error en PHP
        error_reporting(0);

        //Consulta a la tabla de usuarios para poder ingresar
        $sqlL = $con->query("SELECT * FROM usuario WHERE nom_usuario='$usuario' AND contrasena_usuario='$contrasena'");
        $datos = $sqlL->fetch_object();

        // Vuelve a habilitar los mensajes de error en PHP
        error_reporting(E_ALL);
        //Si la variable datos no es NULL se ejecuta el codigo completo
        if ($datos) {
            //Se guarda el id del colaborador en una variable a parte
            $id_colaborador = $datos->id_colaborador;

            //Consulta para obtener el array de valores de la tabla usuario
            $sqlDatos = $con->query("SELECT * FROM usuario WHERE nom_usuario='$usuario' AND contrasena_usuario='$contrasena'");
            $resultado = mysqli_fetch_array($sqlDatos);

            //Consulta a la tabla de colaboradores para obtener la información
            $sqlDatosC = $con->query("SELECT * FROM colaborador WHERE id_colaborador='$id_colaborador'");
            $resultadoC = $sqlDatosC->fetch_object();
            //Se guardan los id de localidad y jefatura en variables a parte
            $id_localidad = $resultadoC->id_localidad;
            $id_jefatura = $resultadoC->id_jefatura;

            //Consulta a la tabla localidad para obtener el nombre de la localidad
            $sqlDatosL = $con->query("SELECT * FROM localidad WHERE id_localidad='$id_localidad'");
            $resultadoL = $sqlDatosL->fetch_object();

            //Consulta a la tabla jefatura para obtener el nombre de la jefatura
            $sqlDatosJ = $con->query("SELECT * FROM jefatura WHERE id_jefatura='$id_jefatura'");
            $resultadoJ = $sqlDatosJ->fetch_object();

            //Consulta que obtiene el correo del Administrador
            $sqlCorreo = $con->query("SELECT c.correo_colaborador FROM colaborador c INNER JOIN usuario u ON c.id_colaborador = u.id_colaborador WHERE u.id_tipoUsuario = 1");
            $datosCorreo = $sqlCorreo->fetch_object();

            //Administrador
            if ($resultado['id_tipoUsuario'] == 1) {
                $_SESSION["id"] = $datos->id_usuario;
                $_SESSION["nombre"] = $resultadoC->nom_colaborador;
                $_SESSION["apellidoP"] = $resultadoC->aPaterno_colaborador;
                $_SESSION["apellidoM"] = $resultadoC->aMaterno_colaborador;
                $_SESSION["centroCostos"] = $resultadoC->centroCostos_colaborador;
                $_SESSION["correoA"] = $resultadoC->correo_colaborador;
                $_SESSION["localidad"] = $resultadoL->nom_localidad;
                $_SESSION["jefatura"] = $resultadoJ->nom_jefatura;
                header("location: admin/inicio.php");
            //Supervisor
            } elseif ($resultado['id_tipoUsuario'] == 2) {
                $_SESSION["id"] = $datos->id_usuario;
                $_SESSION["nombre"] = $resultadoC->nom_colaborador;
                $_SESSION["apellidoP"] = $resultadoC->aPaterno_colaborador;
                $_SESSION["apellidoM"] = $resultadoC->aMaterno_colaborador;
                $_SESSION["centroCostos"] = $resultadoC->centroCostos_colaborador;
                $_SESSION["correo"] = $resultadoC->correo_colaborador;
                $_SESSION["correoA"] = $datosCorreo->correo_colaborador;
                $_SESSION["localidad"] = $resultadoL->nom_localidad;
                $_SESSION["jefatura"] = $resultadoJ->nom_jefatura;
                header("location: super/inicio-supervisor.php");
            //Usuarios
            } elseif ($resultado['id_tipoUsuario'] == 3) {
                $_SESSION["id"] = $datos->id_usuario;
                $_SESSION["nombre"] = $resultadoC->nom_colaborador;
                $_SESSION["apellidoP"] = $resultadoC->aPaterno_colaborador;
                $_SESSION["apellidoM"] = $resultadoC->aMaterno_colaborador;
                $_SESSION["centroCostos"] = $resultadoC->centroCostos_colaborador;
                $_SESSION["correo"] = $resultadoC->correo_colaborador;
                $_SESSION["correoA"] = $datosCorreo->correo_colaborador;
                $_SESSION["localidad"] = $resultadoL->nom_localidad;
                $_SESSION["jefatura"] = $resultadoJ->nom_jefatura;
                header("location: usuario/inicio-usuario.php");
            }
        } else {
            echo "<div class='alert alert-danger'>Usuario o contraseña incorrectos</div>";
        }
    }
}
