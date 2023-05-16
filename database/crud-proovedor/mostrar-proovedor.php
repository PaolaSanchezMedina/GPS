<?php include('../conexion.php');

$output= array();
$sql = "SELECT * FROM proveedor ";

$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
	0 => 'id_proveedor',
	1 => 'nom_proveedor',
	2 => 'noProvSAP',
	3 => 'RFC_proveedor',
	4 => 'contacto_proveedor',
    5 => 'calle_proveedor',
    6 => 'colonia_proveedor',
    7 => 'codigoPostal_proveedor',
    8 => 'correo_proveedor',
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE nom_proveedor like '%".$search_value."%'";
	$sql .= " OR noProvSAP like '%".$search_value."%'";
	$sql .= " OR RFC_proveedor like '%".$search_value."%'";
	$sql .= " OR contacto_proveedor like '%".$search_value."%'";
    $sql .= " OR calle_proveedor like '%".$search_value."%'";
    $sql .= " OR colonia_proveedor like '%".$search_value."%'";
    $sql .= " OR codigoPostal_proveedor like '%".$search_value."%'";
    $sql .= " OR correo_proveedor like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY id_proveedor desc";
}

if($_POST['length'] != -1)
{
	$start = $_POST['start'];
	$length = $_POST['length'];
	$sql .= " LIMIT  ".$start.", ".$length;
}	

$query = mysqli_query($con,$sql);
$count_rows = mysqli_num_rows($query);
$data = array();
while($row = mysqli_fetch_assoc($query))
{
	$sub_array = array();
	$sub_array[] = $row['id_proveedor'];
	$sub_array[] = $row['nom_proveedor'];
	$sub_array[] = $row['noProvSAP'];
	$sub_array[] = $row['RFC_proveedor'];
	$sub_array[] = $row['contacto_proveedor'];
    $sub_array[] = $row['calle_proveedor'];
	$sub_array[] = $row['colonia_proveedor'];
	$sub_array[] = $row['codigoPostal_proveedor'];
    $sub_array[] = $row['correo_proveedor'];
    $sub_array[] = '<a href="javascript:void();" data-id_proveedor="'.$row['id_proveedor'].'"  class="btn editbtn" ><i role="button" class="fa-solid fa-user-pen text-primary"></i></a><a href="javascript:void();" data-id_proveedor="'.$row['id_proveedor'].'"  class="btn deleteBtn" ><i role="button" class="fa-solid fa-user-xmark text-danger"></i></a>';
	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);