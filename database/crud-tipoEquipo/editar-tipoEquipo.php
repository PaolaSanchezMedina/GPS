<?php include('../conexion.php');
$id_tipoEquipo = $_POST['id_tipoEquipo'];
$sql = "SELECT * FROM tipo_equipo WHERE id_tipoEquipo='$id_tipoEquipo' LIMIT 1";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($query);
echo json_encode($row);
?>