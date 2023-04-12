<?php include('../conexion.php');
$id_localidad = $_POST['id_localidad'];
$sql = "SELECT * FROM localidad WHERE id_localidad='$id_localidad' LIMIT 1";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($query);
echo json_encode($row);
?>