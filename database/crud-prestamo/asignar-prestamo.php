<?php include('../conexion.php');

$id_colaborador = $_POST['id_colaborador'];
$id_equipo = $_POST['id_equipo'];
$identifEquipo_prestamo = $_POST['identifEquipo_prestamo'];
$fechaEntrega_prestamo = $_POST['fechaEntrega_prestamo'];
$id_usuario = $_POST['id_usuario'];
$observaciones_prestamo = $_POST['observaciones_prestamo'];

$sql = "INSERT INTO `prestamo` (`id_colaborador`,`id_equipo`,`identifEquipo_prestamo`,`fechaEntrega_prestamo`,`id_usuario`,`observaciones_prestamo`) values ('$id_colaborador', '$id_equipo', '$identifEquipo_prestamo', '$fechaEntrega_prestamo', '$id_usuario', '$observaciones_prestamo' )";
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