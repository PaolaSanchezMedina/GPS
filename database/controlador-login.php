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

            //Administrador
            if ($resultado['id_tipoUsuario'] == 1) {
                $_SESSION["id"] = $datos->id_usuario;
                $_SESSION["idColaborador"] = $datos->id_colaborador;
                header("location: admin/usuarios.php");
            //Supervisor
            } elseif ($resultado['id_tipoUsuario'] == 2) {
                $_SESSION["id"] = $datos->id_usuario;
                $_SESSION["idColaborador"] = $datos->id_colaborador;
                $_SESSION["nombre"] = $resultadoC->nom_colaborador;
                $_SESSION["apellidoP"] = $resultadoC->aPaterno_colaborador;
                $_SESSION["apellidoM"] = $resultadoC->aMaterno_colaborador;
                $_SESSION["correo"] = $resultadoC->correo_colaborador;
                header("location: super/usuarios-supervisor.php");
            //Usuarios
            } elseif ($resultado['id_tipoUsuario'] == 3) {
                $_SESSION["id"] = $datos->id_usuario;
                $_SESSION["idColaborador"] = $datos->id_colaborador;
                $_SESSION["nombre"] = $resultadoC->nom_colaborador;
                $_SESSION["apellidoP"] = $resultadoC->aPaterno_colaborador;
                $_SESSION["apellidoM"] = $resultadoC->aMaterno_colaborador;
                $_SESSION["correo"] = $resultadoC->correo_colaborador;
                header("location: usuario/prestamos-usuario.php");
            }
        } else {
            echo "<div class='alert alert-danger'>Usuario o contraseña incorrectos</div>";
        }
    }
}
