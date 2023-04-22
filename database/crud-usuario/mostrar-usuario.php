<?php include('../conexion.php');

$output= array();
$sql = "SELECT u.id_usuario, u.nom_usuario, u.contrasena_usuario, t.nom_tipoUsuario, CONCAT(c.nom_colaborador, ' ', c.aPaterno_colaborador, ' ', c.aMaterno_colaborador) as nombre_completo
FROM usuario u
JOIN colaborador c ON u.id_colaborador = c.id_colaborador
JOIN tipousuario t ON u.id_tipoUsuario = t.id_tipoUsuario"; 


$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
	0 => 'id_usuario',
	1 => 'nom_usuario',
	2 => 'contrasena_usuario',
	3 => 'nom_tipoUsuario',
	4 => 'nombre_completo',
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE nom_usuario like '%".$search_value."%'";
	$sql .= " OR contrasena_usuario like '%".$search_value."%'";
	$sql .= " OR t.nom_tipoUsuario like '%".$search_value."%'";
	$sql .= " OR CONCAT(c.nom_colaborador, ' ', c.aPaterno_colaborador, ' ', c.aMaterno_colaborador) like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY id_usuario desc";
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
	$sub_array[] = $row['id_usuario'];
	$sub_array[] = $row['nom_usuario'];
	$sub_array[] = $row['contrasena_usuario'];
	$sub_array[] = $row['nom_tipoUsuario']; 
	$sub_array[] = $row['nombre_completo'];
	$sub_array[] = '<a href="javascript:void();" data-id_usuario="'.$row['id_usuario'].'"  class="btn editbtn" ><i role="button" class="fa-solid fa-user-pen text-primary"></i></a><a href="javascript:void();" data-id_usuario="'.$row['id_usuario'].'"  class="btn deleteBtn" ><i role="button" class="fa-solid fa-user-xmark text-danger"></i></a>';
	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);