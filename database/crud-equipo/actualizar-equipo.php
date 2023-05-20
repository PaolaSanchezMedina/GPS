<?php 
include('../conexion.php');

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
$id_equipo = $_POST['id_equipo'];

$sql = "UPDATE `equipo` SET  `id_marca`='$id_marca',  `id_tipoEquipo`='$id_tipoEquipo',  `noSerie_equipo`='$noSerie_equipo',  `descripcion_equipo`='$descripcion_equipo',  `modelo_equipo`='$modelo_equipo', `OS_equipo`='$OS_equipo',  `moldCPU_equipo`='$moldCPU_equipo',  `velocidadCPU_equipo`='$velocidadCPU_equipo',  `noCores_equipo`='$noCores_equipo',  `tipoMemRAM_equipo`='$tipoMemRAM_equipo',  `velocidadRAM_equipo`='$velocidadRAM_equipo',  `capacidadRAM_equipo`='$capacidadRAM_equipo',  `tipoDiscoDuro_equipo`='$tipoDiscoDuro_equipo',  `capDiscoDuro_equipo`='$capDiscoDuro_equipo',  `MDFoIDF_equipo`='$MDFoIDF_equipo',  `noAFE_equipo`='$noAFE_equipo',  `noPartidaAFE_equipo`='$noPartidaAFE_equipo',  `id_proveedor`='$id_proveedor',  `noFactura_equipo`='$noFactura_equipo',  `fechaCompra_equipo`='$fechaCompra_equipo',  `id_departamento`='$id_departamento',  `comentarios_equipo`='$comentarios_equipo',  `id_tipoPropiedad`='$id_tipoPropiedad' WHERE id_equipo='$id_equipo' ";
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