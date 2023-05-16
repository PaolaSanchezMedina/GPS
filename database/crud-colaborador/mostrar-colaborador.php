<?php include('../conexion.php');

$output= array();
$sql = "SELECT c.numNomina_colaborador, c.nom_colaborador, c.aPaterno_colaborador, c.aMaterno_colaborador, c.centroCostos_colaborador, c.correo_colaborador, l.nom_localidad, j.nom_jefatura
FROM colaborador c
JOIN localidad l ON c.id_localidad = l.id_localidad
JOIN jefatura j ON c.id_jefatura = j.id_jefatura";

$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
	0 => 'numNomina_colaborador',
	1 => 'nom_colaborador',
	2 => 'aPaterno_colaborador',
	3 => 'aMaterno_colaborador',
	4 => 'centroCostos_colaborador',
    5 => 'nom_localidad',
    6 => 'nom_jefatura',
	7 => 'correo_colaborador',
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE nom_colaborador like '%".$search_value."%'";
	$sql .= " OR aPaterno_colaborador like '%".$search_value."%'";
	$sql .= " OR aMaterno_colaborador like '%".$search_value."%'";
	$sql .= " OR centroCostos_colaborador like '%".$search_value."%'";
    $sql .= " OR l.nom_localidad like '%".$search_value."%'";
    $sql .= " OR j.nom_jefatura like '%".$search_value."%'";
	$sql .= " OR correo_colaborador like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY numNomina_colaborador desc";
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
	$sub_array[] = $row['numNomina_colaborador'];
	$sub_array[] = $row['nom_colaborador'];
	$sub_array[] = $row['aPaterno_colaborador'];
	$sub_array[] = $row['aMaterno_colaborador'];
	$sub_array[] = $row['centroCostos_colaborador'];
	$sub_array[] = $row['nom_localidad'];
	$sub_array[] = $row['nom_jefatura'];
	$sub_array[] = $row['correo_colaborador'];
	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);