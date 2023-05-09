<?php
include('../conexion.php');

// Verificar la conexión a la base de datos
if (mysqli_connect_errno()) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

$idColaborador = mysqli_real_escape_string($con, $_POST['idColaborador']);

// Preparar la consulta SQL
$query = "SELECT nom_colaborador, aPaterno_colaborador, aMaterno_colaborador FROM colaborador WHERE id_colaborador = ?";
$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "i", $idColaborador);

// Ejecutar la consulta SQL
if (!mysqli_stmt_execute($stmt)) {
    die("Error al ejecutar la consulta SQL: " . mysqli_error($con));
}

// Obtener los resultados de la consulta
mysqli_stmt_bind_result($stmt, $nombre, $primerApellido, $segundoApellido);
if (mysqli_stmt_fetch($stmt)) {
    //Asignar los valores a los campos correspondientes
    echo "<script>
    document.getElementById('nombre').value = \"$nombre\";
    document.getElementById('primerApellido').value = \"$primerApellido\";
    document.getElementById('segundoApellido').value = \"$segundoApellido\";
</script>";
} else {
    // No se encontró ningún resultado
    die("No se encontró ningún colaborador con el ID especificado");
}

// Cerrar la conexión y el statement
mysqli_stmt_close($stmt);
mysqli_close($con);
