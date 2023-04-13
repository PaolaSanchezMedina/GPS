<?php 
include('../conexion.php');

$equipmentType_id = $_POST['id_tipoEquipo'];
$sql = "DELETE FROM tipoequipo WHERE id_tipoEquipo='$equipmentType_id'";
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