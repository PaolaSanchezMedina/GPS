<?php include('../conexion.php');
$id_usuario = $_POST['id_usuario'];
$sql = "SELECT * FROM usuario WHERE id_usuario='$id_usuario' LIMIT 1";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($query);
echo json_encode($row);
?>