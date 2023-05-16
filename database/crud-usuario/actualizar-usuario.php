<?php 
include('../conexion.php');

$nom_usuario = $_POST['nom_usuario'];
$contrasena_usuario = $_POST['contrasena_usuario'];
$id_tipoUsuario = $_POST['id_tipoUsuario'];
$numNomina_colaborador = $_POST['numNomina_colaborador'];
$id_usuario = $_POST['id_usuario'];

$sql = "UPDATE `usuario` SET  `nom_usuario`='$nom_usuario',  `contrasena_usuario`='$contrasena_usuario',  `id_tipoUsuario`='$id_tipoUsuario',  `numNomina_colaborador`='$numNomina_colaborador' WHERE id_usuario='$id_usuario' ";
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