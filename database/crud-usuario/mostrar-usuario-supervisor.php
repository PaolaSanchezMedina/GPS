<?php include('../conexion.php');

$output= array();
$sql = "SELECT * FROM usuario ";

$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
	0 => 'id_usuario',
	1 => 'nom_usuario',
	2 => 'contrasena_usuario',
	3 => 'id_tipoUsuario',
	4 => 'id_colaborador',
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE nom_usuario like '%".$search_value."%'";
	$sql .= " OR contrasena_usuario like '%".$search_value."%'";
	$sql .= " OR id_tipoUsuario like '%".$search_value."%'";
	$sql .= " OR id_colaborador like '%".$search_value."%'";
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
	$sub_array[] = $row['id_tipoUsuario'];
	$sub_array[] = $row['id_colaborador'];
	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);