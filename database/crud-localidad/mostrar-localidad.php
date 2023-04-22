<?php include('../conexion.php');

$output= array();
$sql = "SELECT l.id_localidad, l.nom_localidad, m.nom_municipio 
FROM localidad l
JOIN municipio m ON l.id_municipio = m.id_municipio";

$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
	0 => 'id_localidad',
	1 => 'nom_localidad',
	2 => 'nom_municipio',
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE nom_localidad like '%".$search_value."%'";
	$sql .= " OR m.nom_municipio like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY id_localidad desc";
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
	$sub_array[] = $row['id_localidad'];
	$sub_array[] = $row['nom_localidad'];
	$sub_array[] = $row['nom_municipio'];
	$sub_array[] = '<a href="javascript:void();" data-id_localidad="'.$row['id_localidad'].'"  class="btn editbtn" ><i role="button" class="fa-solid fa-pen-to-square text-primary"></i></a><a href="javascript:void();" data-id_localidad="'.$row['id_localidad'].'"  class="btn deleteBtn" ><i role="button" class="fa-solid fa-trash-can text-danger"></i></a>';
	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);