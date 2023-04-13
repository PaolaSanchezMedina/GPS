<?php include('../conexion.php');
$id_marca = $_POST['id_marca'];
$sql = "SELECT * FROM marca WHERE id_marca='$id_marca' LIMIT 1";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($query);
echo json_encode($row);
?>