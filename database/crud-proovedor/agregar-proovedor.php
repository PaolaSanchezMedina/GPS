<?php include('../conexion.php');

$nom_proveedor = $_POST['nom_proveedor'];
$noProvSAP = $_POST['noProvSAP'];
$RFC_proveedor = $_POST['RFC_proveedor'];
$contacto_proveedor = $_POST['contacto_proveedor'];
$calle_proveedor = $_POST['calle_proveedor'];
$colonia_proveedor = $_POST['colonia_proveedor'];
$codigoPostal_proveedor = $_POST['codigoPostal_proveedor'];
$correo_proveedor = $_POST['correo_proveedor'];

$sql = "INSERT INTO `proveedor` (`nom_proveedor`,`noProvSAP`,`RFC_proveedor`,`contacto_proveedor`,`calle_proveedor`,`colonia_proveedor`,`codigoPostal_proveedor`,`correo_proveedor`) values ('$nom_proveedor', '$noProvSAP', '$RFC_proveedor', '$contacto_proveedor', '$calle_proveedor', '$colonia_proveedor', '$codigoPostal_proveedor', '$correo_proveedor' )";
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
    );
    echo json_encode($data);
}