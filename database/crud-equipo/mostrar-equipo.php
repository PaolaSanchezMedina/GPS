<?php include('../conexion.php');

$output= array();
$sql = "SELECT e.id_equipo, m.nom_marca, t.nom_tipoEquipo, e.noSerie_equipo, e.descripcion_equipo, 
		e.modelo_equipo, e.OS_equipo, e.moldCPU_equipo, e.velocidadCPU_equipo, e.noCores_equipo, 
		e.tipoMemRAM_equipo, e.velocidadRAM_equipo, e.capacidadRAM_equipo, e.tipoDiscoDuro_equipo, 
		e.capDiscoDuro_equipo, e.MDFoIDF_equipo, e.noAFE_equipo, e.noPartidaAFE_equipo, e.id_proveedor, 
		p.nom_proveedor, e.noFactura_equipo, e.fechaCompra_equipo, d.nom_departamento, e.comentarios_equipo, 
		tp.nom_tipoPropiedad   
		FROM equipo e 
		JOIN marca m ON e.id_marca = m.id_marca
		JOIN tipo_equipo t ON e.id_tipoEquipo = t.id_tipoEquipo
		JOIN proveedor p ON e.id_proveedor = p.id_proveedor
		JOIN departamento d ON e.id_departamento = d.id_departamento
		JOIN tipo_propiedad tp ON e.id_tipoPropiedad = tp.id_tipoPropiedad";

$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
	0 => 'id_equipo',
	1 => 'nom_marca',
	2 => 'nom_tipoEquipo',
	3 => 'noSerie_equipo',
	4 => 'descripcion_equipo',
    5 => 'modelo_equipo',
    6 => 'OS_equipo',
    7 => 'moldCPU_equipo',
    8 => 'velocidadCPU_equipo',
	9 => 'noCores_equipo',
	10 => 'tipoMemRAM_equipo',
	11 => 'velocidadRAM_equipo',
	12 => 'capacidadRAM_equipo',
	13 => 'tipoDiscoDuro_equipo',
	14 => 'capDiscoDuro_equipo',
	15 => 'MDFoIDF_equipo',
	16 => 'noAFE_equipo',
	17 => 'noPartidaAFE_equipo',
	18 => 'nom_proveedor',
	19 => 'noFactura_equipo',
	20 => 'fechaCompra_equipo',
	21 => 'nom_departamento',
	22 => 'comentarios_equipo',
	23 => 'nom_tipoPropiedad',
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE m.nom_marca like '%".$search_value."%'";
	$sql .= " OR t.nom_tipoEquipo like '%".$search_value."%'";
	$sql .= " OR noSerie_equipo like '%".$search_value."%'";
	$sql .= " OR descripcion_equipo like '%".$search_value."%'";
    $sql .= " OR modelo_equipo like '%".$search_value."%'";
    $sql .= " OR OS_equipo like '%".$search_value."%'";
    $sql .= " OR moldCPU_equipo like '%".$search_value."%'";
	$sql .= " OR velocidadCPU_equipo like '%".$search_value."%'";
	$sql .= " OR noCores_equipo like '%".$search_value."%'";
	$sql .= " OR tipoMemRAM_equipo like '%".$search_value."%'";
    $sql .= " OR velocidadRAM_equipo like '%".$search_value."%'";
    $sql .= " OR capacidadRAM_equipo like '%".$search_value."%'";
    $sql .= " OR tipoDiscoDuro_equipo like '%".$search_value."%'";
	$sql .= " OR capDiscoDuro_equipo like '%".$search_value."%'";
	$sql .= " OR MDFoIDF_equipo like '%".$search_value."%'";
	$sql .= " OR noAFE_equipo like '%".$search_value."%'";
    $sql .= " OR noPartidaAFE_equipo like '%".$search_value."%'";
    $sql .= " OR p.nom_proveedor like '%".$search_value."%'";
    $sql .= " OR noFactura_equipo like '%".$search_value."%'";
	$sql .= " OR fechaCompra_equipo like '%".$search_value."%'";
	$sql .= " OR d.nom_departamento like '%".$search_value."%'";
	$sql .= " OR comentarios_equipo like '%".$search_value."%'";
    $sql .= " OR tp.nom_tipoPropiedad like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY id_proveedor desc";
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
	$sub_array[] = $row['nom_tipoEquipo'];
	$sub_array[] = $row['nom_marca'];
	$sub_array[] = $row['noSerie_equipo'];
    $sub_array[] = $row['modelo_equipo'];
	$sub_array[] = $row['OS_equipo'];
	$sub_array[] = $row['moldCPU_equipo'];
	$sub_array[] = $row['tipoMemRAM_equipo'];
	$sub_array[] = $row['capacidadRAM_equipo'];
	$sub_array[] = $row['tipoDiscoDuro_equipo'];
    $sub_array[] = $row['capDiscoDuro_equipo'];
	$sub_array[] = $row['nom_departamento'];
	$sub_array[] = $row['velocidadCPU_equipo'];
	$sub_array[] = $row['noCores_equipo'];
	$sub_array[] = $row['velocidadRAM_equipo'];
	$sub_array[] = $row['MDFoIDF_equipo'];
	$sub_array[] = $row['noAFE_equipo'];
    $sub_array[] = $row['noPartidaAFE_equipo'];
	$sub_array[] = $row['nom_proveedor'];
	$sub_array[] = $row['noFactura_equipo'];
	$sub_array[] = $row['fechaCompra_equipo'];
	$sub_array[] = $row['comentarios_equipo'];
    $sub_array[] = $row['nom_tipoPropiedad'];
	$sub_array[] = $row['descripcion_equipo'];
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