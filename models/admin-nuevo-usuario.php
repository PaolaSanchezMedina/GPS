<?php include('conexion.php');

$nombre = $_POST['nombre'];
$apellidop = $_POST['apellidop'];
$apellidom = $_POST['apellidom'];
$usuario = $_POST['usuario'];
$contra = $_POST['contra'];

$sql = "INSERT INTO `usuarios` (`nombre`,`apellidop`,`apellidom`,`usuario`,`contra`) values ('$nombre', '$apellidop', '$apellidom', '$usuario', '$contra' )";
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

?>

