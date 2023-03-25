<?php include('../conexion.php');
$idusuario = $_POST['idusuario'];
$sql = "SELECT * FROM usuarios WHERE idusuario='$idusuario' LIMIT 1";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($query);
echo json_encode($row);
?>