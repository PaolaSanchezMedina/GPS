<?php 
include('../conexion.php');

$nom_proveedor = $_POST['nom_proveedor'];
$noProvSAP = $_POST['noProvSAP'];
$RFC_proveedor = $_POST['RFC_proveedor'];
$contacto_proveedor = $_POST['contacto_proveedor'];
$calle_proveedor = $_POST['calle_proveedor'];
$colonia_proveedor = $_POST['colonia_proveedor'];
$codigoPostal_proveedor = $_POST['codigoPostal_proveedor'];
$correo_proveedor = $_POST['correo_proveedor'];
$id_proveedor = $_POST['id_proveedor'];

$sql = "UPDATE `proveedor` SET  `nom_proveedor`='$nom_proveedor',  `noProvSAP`='$noProvSAP',  `RFC_proveedor`='$RFC_proveedor',  `contacto_proveedor`='$contacto_proveedor',  `calle_proveedor`='$calle_proveedor',  `colonia_proveedor`='$colonia_proveedor',  `codigoPostal_proveedor`='$codigoPostal_proveedor',  `correo_proveedor`='$correo_proveedor' WHERE id_proveedor='$id_proveedor' ";
$query= mysqli_query($con,$sql);
$lastId = mysqli_insert_id($con);
if($query ==true)
{
    $data = array(
        'status'=>'true',
       
    );
    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'false', 
    );
    echo json_encode($data);
}
