<?php include('../conexion.php');

$nom_localidad = $_POST['nom_localidad'];
$id_estado = $_POST['id_estado'];

$sql = "INSERT INTO `localidad` (`nom_localidad`,`id_estado`) values ('$nom_localidad', '$id_estado')";
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
