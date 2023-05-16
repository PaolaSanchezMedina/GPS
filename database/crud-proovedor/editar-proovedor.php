<?php include('../conexion.php');
$id_proveedor = $_POST['id_proveedor'];
$sql = "SELECT * FROM proveedor WHERE id_proveedor='$id_proveedor' LIMIT 1";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($query);
echo json_encode($row);
?>