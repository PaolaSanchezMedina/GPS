<?php 
include('../conexion.php');

$nom_tipoEquipo = $_POST['nom_tipoEquipo'];
$id_municipio = $_POST['id_municipio'];
$id_tipoEquipo = $_POST['id_tipoEquipo'];

$sql = "UPDATE `tipoequipo` SET  `nom_tipoEquipo`='$nom_tipoEquipo',  `id_clasiEquipo`='id_clasiEquipo' WHERE id_tipoEquipo='$id_tipoEquipo' ";
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