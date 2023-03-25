<?php 
include('../conexion.php');

$nombre = $_POST['nombre'];
$primer_apellido = $_POST['primer_apellido'];
$segundo_apellido = $_POST['segundo_apellido'];
$usuario = $_POST['usuario'];
$contra = $_POST['contra'];
$id_tipo_usuario = $_POST['id_tipo_usuario'];
$id_usuario = $_POST['id_usuario'];

$sql = "UPDATE `usuarios` SET  `nombre`='$nombre' , `primer_apellido`= '$primer_apellido', `segundo_apellido`='$segundo_apellido', `usuario`='$usuario',  `contra`='$contra',  `id_tipo_usuario`='$id_tipo_usuario' WHERE id_usuario='$id_usuario' ";
$query= mysqli_query($con,$sql);
$lastId = mysqli_insert_id($con);
if($query ==true)
{
    $data = array(
        'status'=>'true',
       
    );
    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'false', 
    );
    echo json_encode($data);
} 

?>