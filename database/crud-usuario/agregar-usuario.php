<?php include('../conexion.php');

$nombre = $_POST['nombre'];
$primer_apellido = $_POST['primer_apellido'];
$segundo_apellido = $_POST['segundo_apellido'];
$usuario = $_POST['usuario'];
$contra = $_POST['contra'];
$id_tipo_usuario = $_POST['id_tipo_usuario'];

$sql = "INSERT INTO `usuarios` (`nombre`,`primer_apellido`,`segundo_apellido`,`usuario`,`contra`,`id_tipo_usuario`) values ('$nombre', '$primer_apellido', '$segundo_apellido', '$usuario', '$contra', '$id_tipo_usuario' )";
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