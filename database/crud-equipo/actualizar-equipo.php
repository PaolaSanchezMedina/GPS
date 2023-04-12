<?php 
include('../conexion.php');

$nom_equipo = $_POST['nom_equipo'];
$modelo_equipo = $_POST['modelo_equipo'];
$noSerie_equipo = $_POST['noSerie_equipo'];
$id_marca = $_POST['id_marca'];
$id_tipoEquipo = $_POST['id_tipoEquipo'];
$descripcion_equipo = $_POST['descripcion_equipo'];
$id_proveedor = $_POST['id_proveedor'];
$id_equipo = $_POST['id_equipo'];

$sql = "UPDATE `equipo` SET  `nom_equipo`='$nom_equipo',  `modelo_equipo`='$modelo_equipo',  `noSerie_equipo`='$noSerie_equipo',  `id_marca`='$id_marca',  `id_tipoEquipo`='$id_tipoEquipo',  `descripcion_equipo`='$descripcion_equipo',  `id_proveedor`='$id_proveedor' WHERE id_equipo='$id_equipo' ";
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