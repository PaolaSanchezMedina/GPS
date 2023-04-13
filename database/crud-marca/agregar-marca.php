<?php include('../conexion.php');

$nom_marca = $_POST['nom_marca'];

$sql = "INSERT INTO `marca` (`nom_marca`) values ('$nom_marca')";
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