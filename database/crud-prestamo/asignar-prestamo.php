<?php include('../conexion.php');

$numNomina_colaborador = $_POST['numNomina_colaborador'];
$id_equipo = $_POST['id_equipo'];
$fechaEntrega_prestamo = $_POST['fechaEntrega_prestamo'];
$observaciones_prestamo = $_POST['observaciones_prestamo'];
$usuarioEntrega_prestamo = $_POST['usuarioEntrega_prestamo'];
$nomEquipo_prestamo = $_POST['nomEquipo_prestamo'];
$dominio_prestamo = $_POST['dominio_prestamo'];
$portable_prestamo = $_POST['portable_prestamo'];
$status_prestamo = $_POST['status_prestamo'];

$sql = "INSERT INTO `prestamo` (`numNomina_colaborador`,`id_equipo`,`fechaEntrega_prestamo`,`observaciones_prestamo`,`usuarioEntrega_prestamo`,`nomEquipo_prestamo`,`dominio_prestamo`,`portable_prestamo`,`status_prestamo`) values ('$numNomina_colaborador', '$id_equipo', '$fechaEntrega_prestamo', '$observaciones_prestamo', '$usuarioEntrega_prestamo', '$nomEquipo_prestamo', '$dominio_prestamo', '$portable_prestamo', '$status_prestamo' )";
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
        'error_message' => mysqli_error($con)
    );
    echo json_encode($data);
}