<?php include('../conexion.php');

$nom_localidad = $_POST['nom_localidad'];
$id_municipio = $_POST['id_municipio'];

$sql = "INSERT INTO `localidad` (`nom_localidad`,`id_municipio`) values ('$nom_localidad', '$id_municipio')";
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