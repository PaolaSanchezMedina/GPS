<?php include('../conexion.php');

$output= array();
$sql = "SELECT * FROM tipoequipo ";

$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
	0 => 'id_tipoEquipo',
	1 => 'nom_tipoEquipo',
	2 => 'id_clasiEquipo',
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE nom_tipoEquipo like '%".$search_value."%'";
	$sql .= " OR id_clasiEquipo like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY id_tipoEquipo desc";
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
	$sub_array[] = $row['id_tipoEquipo'];
	$sub_array[] = $row['nom_tipoEquipo'];
	$sub_array[] = $row['id_clasiEquipo'];
	$sub_array[] = '<a href="javascript:void();" data-id_tipoEquipo="'.$row['id_tipoEquipo'].'"  class="btn editbtn" ><i role="button" class="fa-solid fa-pen-to-square text-primary"></i></a><a href="javascript:void();" data-id_tipoEquipo="'.$row['id_tipoEquipo'].'"  class="btn deleteBtn" ><i role="button" class="fa-solid fa-trash-can text-danger"></i></a>';
	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);