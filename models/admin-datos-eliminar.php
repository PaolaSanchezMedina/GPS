<?php include('conexion.php');

$idusuario = $_POST['idusuario'];
$sql = "DELETE FROM usuarios WHERE idusuario='$idusuario'";
$delQuery =mysqli_query($con,$sql);
if($delQuery==true)
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