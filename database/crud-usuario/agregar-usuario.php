<?php include('../conexion.php');

$nom_usuario = $_POST['nom_usuario'];
$contrasena_usuario = $_POST['contrasena_usuario'];
$id_tipoUsuario = $_POST['id_tipoUsuario'];
$numNomina_colaborador = $_POST['numNomina_colaborador'];

$sql = "INSERT INTO `usuario` (`nom_usuario`,`contrasena_usuario`,`id_tipoUsuario`,`numNomina_colaborador`) values ('$nom_usuario', '$contrasena_usuario', '$id_tipoUsuario', '$numNomina_colaborador' )";
$query= mysqli_query($con,$sql);
if($query==true)
{
    $data = array(
        'status'=>'success',
    );
    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'failed',
    );
    echo json_encode($data);
}