<?php include('../conexion.php');
$id_equipo = $_POST['id_equipo'];
$sql = "SELECT * FROM equipo WHERE id_equipo='$id_equipo' LIMIT 1";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($query);
echo json_encode($row);
?>