<?php include('../conexion.php');

$nom_tipoEquipo = $_POST['nom_tipoEquipo'];
$id_clasiEquipo = $_POST['id_clasiEquipo'];

$sql = "INSERT INTO `tipoequipo` (`nom_tipoEquipo`,`id_clasiEquipo`) values ('$nom_tipoEquipo', '$id_clasiEquipo')";
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