<?php 
include('../conexion.php');

$user_id = $_POST['idusuario'];
$sql = "DELETE FROM usuarios WHERE idusuario='$user_id'";
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