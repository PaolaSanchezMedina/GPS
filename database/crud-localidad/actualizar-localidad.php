<?php 
include('../conexion.php');

$nom_localidad = $_POST['nom_localidad'];
$id_estado = $_POST['id_estado'];
$id_localidad = $_POST['id_localidad'];

$sql = "UPDATE `localidad` SET  `nom_localidad`='$nom_localidad',  `id_estado`='$id_estado' WHERE id_localidad='$id_localidad' ";
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