<?php 
include('../conexion.php');

$location_id = $_POST['id_localidad'];
$sql = "DELETE FROM localidad WHERE id_localidad='$location_id'";
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