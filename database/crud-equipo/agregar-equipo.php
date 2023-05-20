<?php include('../conexion.php');

$id_tipoEquipo = $_POST['id_tipoEquipo'];
$id_marca = $_POST['id_marca'];
$noSerie_equipo = $_POST['noSerie_equipo'];
$descripcion_equipo = $_POST['descripcion_equipo'];
$modelo_equipo = $_POST['modelo_equipo'];
$OS_equipo = $_POST['OS_equipo'];
$moldCPU_equipo = $_POST['moldCPU_equipo'];
$velocidadCPU_equipo = $_POST['velocidadCPU_equipo'];
$noCores_equipo = $_POST['noCores_equipo'];
$tipoMemRAM_equipo = $_POST['tipoMemRAM_equipo'];
$velocidadRAM_equipo = $_POST['velocidadRAM_equipo'];
$capacidadRAM_equipo = $_POST['capacidadRAM_equipo'];
$tipoDiscoDuro_equipo = $_POST['tipoDiscoDuro_equipo'];
$capDiscoDuro_equipo = $_POST['capDiscoDuro_equipo'];
$MDFoIDF_equipo = $_POST['MDFoIDF_equipo'];
$noAFE_equipo = $_POST['noAFE_equipo'];
$noPartidaAFE_equipo = $_POST['noPartidaAFE_equipo'];
$id_proveedor = $_POST['id_proveedor'];
$noFactura_equipo = $_POST['noFactura_equipo'];
$fechaCompra_equipo = $_POST['fechaCompra_equipo'];
$id_departamento = $_POST['id_departamento'];
$comentarios_equipo = $_POST['comentarios_equipo'];
$id_tipoPropiedad = $_POST['id_tipoPropiedad'];

$sql = "INSERT INTO `equipo` (`id_tipoEquipo`,`id_marca`,`noSerie_equipo`,`descripcion_equipo`,`modelo_equipo`,`OS_equipo`,`moldCPU_equipo`,`velocidadCPU_equipo`,`noCores_equipo`,`tipoMemRAM_equipo`,`velocidadRAM_equipo`,`capacidadRAM_equipo`,`tipoDiscoDuro_equipo`,`capDiscoDuro_equipo`,`MDFoIDF_equipo`,`noAFE_equipo`,`noPartidaAFE_equipo`,`id_proveedor`,`noFactura_equipo`,`fechaCompra_equipo`,`id_departamento`,`comentarios_equipo`,`id_tipoPropiedad`) values ('$id_tipoEquipo','$id_marca','$noSerie_equipo','$descripcion_equipo','$modelo_equipo','$OS_equipo','$moldCPU_equipo','$velocidadCPU_equipo','$noCores_equipo','$tipoMemRAM_equipo','$velocidadRAM_equipo','$capacidadRAM_equipo','$tipoDiscoDuro_equipo','$capDiscoDuro_equipo','$MDFoIDF_equipo','$noAFE_equipo','$noPartidaAFE_equipo','$id_proveedor','$noFactura_equipo','$fechaCompra_equipo','$id_departamento','$comentarios_equipo','$id_tipoPropiedad' )";
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