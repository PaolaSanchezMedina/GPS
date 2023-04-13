<?php 
include('../conexion.php');

$nom_marca = $_POST['nom_marca'];
$id_marca = $_POST['id_marca'];

$sql = "UPDATE `marca` SET  `nom_marca`='$nom_marca' WHERE id_marca='$id_marca' ";
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