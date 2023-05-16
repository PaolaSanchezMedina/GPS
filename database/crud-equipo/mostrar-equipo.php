<?php include('../conexion.php');

$output= array();
$sql = "SELECT e.id_equipo, m.nom_marca, t.nom_tipoEquipo, e.noSerie_equipo, e.descripcion_equipo, e.modelo_equipo, p.nom_proveedor
FROM equipo e
JOIN marca m ON e.id_marca = m.id_marca
JOIN tipo_equipo t ON e.id_tipoEquipo = t.id_tipoEquipo
JOIN proveedor p ON e.id_proveedor = p.id_proveedor";


$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
	0 => 'id_equipo',
	1 => 'nom_marca',
	2 => 'nom_tipoEquipo',
	3 => 'noSerie_equipo',
	4 => 'descripcion_equipo',
    5 => 'modelo_equipo',
	6 => 'nom_proveedor',
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE m.nom_marca like '%".$search_value."%'";
	$sql .= " OR t.nom_tipoEquipo like '%".$search_value."%'";
	$sql .= " OR noSerie_equipo like '%".$search_value."%'";
	$sql .= " OR descripcion_equipo like '%".$search_value."%'";
    $sql .= " OR modelo_equipo like '%".$search_value."%'";
	$sql .= " OR p.nom_proveedor like '%".$search_value."%'";
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
	$sub_array[] = $row['nom_marca'];
	$sub_array[] = $row['nom_tipoEquipo'];
	$sub_array[] = $row['noSerie_equipo'];
	$sub_array[] = $row['descripcion_equipo'];
    $sub_array[] = $row['modelo_equipo'];
	$sub_array[] = $row['nom_proveedor'];
	$sub_array[] = '<a href="javascript:void();" data-id_equipo="'.$row['id_equipo'].'"  class="btn editbtn" ><i role="button" class="fa-solid fa-pen-to-square text-primary"></i></a><a href="javascript:void();" data-id_equipo="'.$row['id_equipo'].'"  class="btn deleteBtn" ><i role="button" class="fa-solid fa-trash-can text-danger"></i></a>';
	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);