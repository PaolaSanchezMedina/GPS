<?php include('../conexion.php');

$output= array();
$sql = "SELECT p.id_prestamo, CONCAT(c.nom_colaborador, ' ', c.aPaterno_colaborador, ' ', c.aMaterno_colaborador) as nombre_completo, e.nom_equipo, p.identifEquipo_prestamo, p.fechaEntrega_prestamo, u.nom_usuario, p.observaciones_prestamo
FROM prestamo p
JOIN colaborador c ON p.id_colaborador = c.id_colaborador
JOIN equipo e ON p.id_equipo = e.id_equipo
JOIN usuario u ON p.id_usuario = u.id_usuario";

$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array( 
	0 => 'id_prestamo', 
	1 => 'nombre_completo',
	2 => 'nom_equipo',
	3 => 'identifEquipo_prestamo',
	4 => 'fechaEntrega_prestamo',
    5 => 'nom_usuario',
    6 => 'observaciones_prestamo',
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE CONCAT(c.nom_colaborador, ' ', c.aPaterno_colaborador, ' ', c.aMaterno_colaborador) like '%".$search_value."%'";
	$sql .= " OR e.nom_equipo like '%".$search_value."%'";
	$sql .= " OR identifEquipo_prestamo like '%".$search_value."%'";
	$sql .= " OR fechaEntrega_prestamo like '%".$search_value."%'";
    $sql .= " OR u.nom_usuario like '%".$search_value."%'";
    $sql .= " OR observaciones_prestamo like '%".$search_value."%'";
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
	$sub_array[] = $row['nombre_completo'];
	$sub_array[] = $row['nom_equipo'];
	$sub_array[] = $row['identifEquipo_prestamo'];
	$sub_array[] = $row['fechaEntrega_prestamo'];
    $sub_array[] = $row['nom_usuario'];
	$sub_array[] = $row['observaciones_prestamo'];
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