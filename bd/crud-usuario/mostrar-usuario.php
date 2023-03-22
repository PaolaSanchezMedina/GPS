<?php include('../conexion.php');

$output= array();
$sql = "SELECT * FROM usuarios ";

$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
	0 => 'idusuario',
	1 => 'nombre',
	2 => 'apellidop',
	3 => 'apellidom',
	4 => 'usuario',
	5 => 'contra',
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE nombre like '%".$search_value."%'";
	$sql .= " OR apellidop like '%".$search_value."%'";
	$sql .= " OR apellidom like '%".$search_value."%'";
	$sql .= " OR usuario like '%".$search_value."%'";
	$sql .= " OR contra like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY idusuario desc";
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
	$sub_array[] = $row['idusuario'];
	$sub_array[] = $row['nombre'];
	$sub_array[] = $row['apellidop'];
	$sub_array[] = $row['apellidom'];
	$sub_array[] = $row['usuario'];
	$sub_array[] = $row['contra'];
	$sub_array[] = '<a href="javascript:void();"><i role="button" class="fa-solid fa-user-pen text-info ms-1 me-2 editbtn"></i></a> <a href="javascript:void();"><i role="button" class="fa-solid fa-user-xmark text-danger deleteBtn"></i></a>';
	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);