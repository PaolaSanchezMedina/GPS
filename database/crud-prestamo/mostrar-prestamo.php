<?php include('../conexion.php');

$output= array();
$sql = "SELECT p.id_prestamo, p.numNomina_colaborador, e.descripcion_equipo, p.fechaEntrega_prestamo, p.observaciones_prestamo, p.usuarioEntrega_prestamo, p.nomEquipo_prestamo, p.dominio_prestamo, p.portable_prestamo, p.status_prestamo
FROM prestamo p
JOIN equipo e ON p.id_equipo = e.id_equipo";

$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array( 
	0 => 'id_prestamo', 
	1 => 'numNomina_colaborador',
	2 => 'descripcion_equipo',
	3 => 'fechaEntrega_prestamo',
	4 => 'observaciones_prestamo',
    5 => 'usuarioEntrega_prestamo',
    6 => 'nomEquipo_prestamo',
	7 => 'dominio_prestamo',
	8 => 'portable_prestamo',
	9 => 'status_prestamo',
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE numNomina_colaborador like '%".$search_value."%'";
	$sql .= " OR e.descripcion_equipo like '%".$search_value."%'";
	$sql .= " OR fechaEntrega_prestamo like '%".$search_value."%'";
    $sql .= " OR observaciones_prestamo like '%".$search_value."%'";
    $sql .= " OR usuarioEntrega_prestamo like '%".$search_value."%'";
	$sql .= " OR nomEquipo_prestamo like '%".$search_value."%'";
    $sql .= " OR dominio_prestamo like '%".$search_value."%'";
    $sql .= " OR portable_prestamo like '%".$search_value."%'";
	$sql .= " OR status_prestamo like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY id_prestamo desc";
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
	$sub_array[] = $row['id_prestamo'];
	$sub_array[] = $row['numNomina_colaborador'];
	$sub_array[] = $row['descripcion_equipo'];
	$sub_array[] = $row['fechaEntrega_prestamo'];
	$sub_array[] = $row['observaciones_prestamo'];
    $sub_array[] = $row['usuarioEntrega_prestamo'];
	$sub_array[] = $row['nomEquipo_prestamo'];
	$sub_array[] = $row['dominio_prestamo'];
	$sub_array[] = $row['portable_prestamo'];
	$sub_array[] = $row['status_prestamo'];
    $sub_array[] = '<a href="javascript:void();" data-id_prestamo="'.$row['id_prestamo'].'"  class="btn editbtn" ><i role="button" class="fa-solid fa-user-pen text-primary"></i></a><a href="javascript:void();" data-id_prestamo="'.$row['id_prestamo'].'"  class="btn deleteBtn" ><i role="button" class="fa-solid fa-user-xmark text-danger"></i></a>';
	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);