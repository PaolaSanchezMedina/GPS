<?php
session_start();
if(!empty($_POST["btnIniciar"])){
    if (!empty($_POST["usuario"]) and !empty($_POST["contrasena"])) {
        $usuario=$_POST["usuario"];
        $contrasena=$_POST["contrasena"];
        //Consulta a la tabla de usuarios para poder ingresar
        $sqlL = $con->query("SELECT * FROM usuario WHERE nom_usuario='$usuario' AND contrasena_usuario='$contrasena'");
        //Consulta a la tabla de colaboradores para obtener la información
        $sqlDatos = $con->query("SELECT * FROM usuario WHERE nom_usuario='$usuario' AND contrasena_usuario='$contrasena'");
        
        $resultado=mysqli_fetch_array($sqlDatos);

        if($datos=$sqlL->fetch_object()){
            //Administrador
            if($resultado['id_tipoUsuario']==1){
                $_SESSION["id"]=$datos->id_usuario;
                $_SESSION["usuario"]=$datos->nom_usuario;
                header("location: admin/inicio.php");
            //Supervisor
            }elseif($resultado['id_tipoUsuario']==2){
                $_SESSION["id"]=$datos->id_usuario;
                $_SESSION["usuario"]=$datos->nom_usuario;
                header("location: super/inicio-supervisor.php");
            //Usuarios
            }elseif($resultado['id_tipoUsuario']==3){
                $_SESSION["id"]=$datos->id_usuario;
                $_SESSION["usuario"]=$datos->nom_usuario;
                header("location: usuario/inicio-usuario.php");
            }
        }else{
            echo "<div class='alert alert-danger'>Usuario o contraseña incorrectos</div>";
        }
        
    }
    
}