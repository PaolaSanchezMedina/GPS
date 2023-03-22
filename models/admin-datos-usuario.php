<?php include('conexion.php');

$sql = "SELECT * FROM usuarios ";
$query = mysqli_query($con,$sql);
$count_all_rows = mysqli_num_rows($query);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE nombre like '%".$search_value."%' ";
	$sql .= " OR apellidop like '%".$search_value."%' ";
	$sql .= " OR apellidom like '%".$search_value."%' ";
	$sql .= " OR usuario like '%".$search_value."%' ";
    $sql .= " OR contra like '%".$search_value."%' ";
}

if(isset($_POST['order']))
{
	$column = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY '".$column."' ".$order;
}
else
{
	$sql .= " ORDER BY idusuario ASC";
}

if($_POST['length'] != -1)
{
    $start = $_POST['start'];
    $length = $_POST['length'];
    $sql .=" LIMIT ".$start.", ".$length; 
}

$data = array();

$run_query = mysqli_query($con,$sql);
$filtered_rows = mysqli_num_rows($run_query);
while($row = mysqli_fetch_assoc($run_query))
{
    $subarray = array();
    $sub_array[] = $row['idusuario'];
	$sub_array[] = $row['nombre'];
	$sub_array[] = $row['apellidop'];
	$sub_array[] = $row['apellidom'];
	$sub_array[] = $row['usuario'];
	$sub_array[] = $row['contra'];
	$sub_array[] = '<a href="javascript:void();"><i role="button" class="fa-solid fa-user-pen text-info ms-1 me-2"></i></a> <a href="javascript:void();"><i role="button" class="fa-solid fa-user-xmark text-danger"></i></a>';
	$data[] = $sub_array;
}


$output = array(
    'data'=>$data,
	'draw'=>intval($_POST['draw']),
	'recordsTotal' =>$count_all_rows,
	'recordsFiltered'=>$filtered_rows,
);

echo json_encode($output);