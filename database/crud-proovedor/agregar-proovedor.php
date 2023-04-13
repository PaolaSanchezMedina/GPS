<?php include('../conexion.php');

$nom_equipo = $_POST['nom_equipo'];
$modelo_equipo = $_POST['modelo_equipo'];
$noSerie_equipo = $_POST['noSerie_equipo'];
$id_marca = $_POST['id_marca'];
$id_tipoEquipo = $_POST['id_tipoEquipo'];
$descripcion_equipo = $_POST['descripcion_equipo'];
$id_proveedor = $_POST['id_proveedor'];

$sql = "INSERT INTO `equipo` (`nom_equipo`,`modelo_equipo`,`noSerie_equipo`,`id_marca`,`id_tipoEquipo`,`descripcion_equipo`,`id_proveedor`) values ('$nom_equipo', '$modelo_equipo', '$noSerie_equipo', '$id_marca', '$id_tipoEquipo', '$descripcion_equipo', '$id_proveedor' )";
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