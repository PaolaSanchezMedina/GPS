<?php 
include('../conexion.php');

$proveedor_id = $_POST['id_proveedor'];
$sql = "DELETE FROM provedor WHERE id_proveedor='$proveedor_id'";
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