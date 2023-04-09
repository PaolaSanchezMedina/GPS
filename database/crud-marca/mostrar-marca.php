<?php include('../conexion.php');

$output= array();
$sql = "SELECT * FROM marca ";

$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
	0 => 'id_marca',
	1 => 'nom_marca',
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE nom_marca like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY id_marca desc";
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
	$sub_array[] = $row['id_marca'];
	$sub_array[] = $row['nom_marca'];
	$sub_array[] = '<a href="javascript:void();" data-id_marca="'.$row['id_marca'].'"  class="btn editbtn" ><i role="button" class="fa-solid fa-user-pen text-primary"></i></a><a href="javascript:void();" data-id_marca="'.$row['id_marca'].'"  class="btn deleteBtn" ><i role="button" class="fa-solid fa-user-xmark text-danger"></i></a>';
	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);