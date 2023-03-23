<?php include('../conexion.php');

$nombre = $_POST['nombre'];
$apellidop = $_POST['apellidop'];
$apellidom = $_POST['apellidom'];
$usuario = $_POST['usuario'];
$contra = $_POST['contra'];
$idusuario = $_POST['idusuario'];

$sql = "UPDATE `usuarios` SET  `nombre`='$nombre' , `apellidop`= '$apellidop', `apellidom`= '$apellidom', `usuario`='$usuario',  `contra`='$contra' WHERE idusuario='$idusuario' ";
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