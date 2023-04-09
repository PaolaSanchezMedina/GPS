<?php include('../conexion.php');

$output= array();
$sql = "SELECT * FROM equipo ";

$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
	0 => 'id_equipo',
	1 => 'nom_equipo',
	2 => 'modelo_equipo',
	3 => 'noSerie_equipo',
	4 => 'id_marca',
    5 => 'id_tipoEquipo',
	6 => 'descripcion_equipo',
	7 => 'id_proveedor',
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE nom_equipo like '%".$search_value."%'";
	$sql .= " OR modelo_equipo like '%".$search_value."%'";
	$sql .= " OR noSerie_equipo like '%".$search_value."%'";
	$sql .= " OR id_marca like '%".$search_value."%'";
    $sql .= " OR id_tipoEquipo like '%".$search_value."%'";
	$sql .= " OR descripcion_equipo like '%".$search_value."%'";
	$sql .= " OR id_proveedor like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY id_equipo desc";
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
	$sub_array[] = $row['id_equipo'];
	$sub_array[] = $row['nom_equipo'];
	$sub_array[] = $row['modelo_equipo'];
	$sub_array[] = $row['noSerie_equipo'];
	$sub_array[] = $row['id_marca'];
    $sub_array[] = $row['id_tipoEquipo'];
	$sub_array[] = $row['descripcion_equipo'];
	$sub_array[] = $row['id_proveedor'];
	$sub_array[] = '<a href="javascript:void();" data-id_equipo="'.$row['id_equipo'].'"  class="btn editbtn" ><i role="button" class="fa-solid fa-user-pen text-primary"></i></a><a href="javascript:void();" data-id_equipo="'.$row['id_equipo'].'"  class="btn deleteBtn" ><i role="button" class="fa-solid fa-user-xmark text-danger"></i></a>';
	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);