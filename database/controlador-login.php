<?php
session_start();
if(!empty($_POST["btnIniciar"])){
    if (!empty($_POST["usuario"]) and !empty($_POST["contrasena"])) {
        $usuario=$_POST["usuario"];
        $contrasena=$_POST["contrasena"];
        //Consulta a la tabla de usuarios para poder ingresar
        $sqlL = $con->query("SELECT * FROM usuarios WHERE usuario='$usuario' AND contra='$contrasena'");
        //Consulta a la tabla de colaboradores para obtener la información
        $sqlDatos = $con->query("SELECT * FROM usuarios WHERE usuario='$usuario' AND contra='$contrasena'");
        
        $resultado=mysqli_fetch_array($sqlDatos);

        if($datos=$sqlL->fetch_object()){
            //Administrador
            if($resultado['id_tipo_usuario']==1){
                $_SESSION["usuario"]=$datos->usuario;
                header("location: admin/inicio.php");
            //Supervisor
            }elseif($resultado['id_tipo_usuario']==2){
                $_SESSION["usuario"]=$datos->usuario;
                header("location: super/inicio-supervisor.php");
            //Usuarios
            }elseif($resultado['id_tipo_usuario']==3){
                $_SESSION["usuario"]=$datos->usuario;
                header("location: usuario/inicio-usuario.php");
            }
        }else{
            echo "<div class='alert alert-danger'>Usuario o contraseña incorrectos</div>";
        }
        
    }
    
}