<?php 
include('../conexion.php');

$equipment_id = $_POST['id_equipo'];
$sql = "DELETE FROM equipo WHERE id_equipo='$equipment_id'";
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