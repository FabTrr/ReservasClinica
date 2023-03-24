<?php
// Conectar a la base de datos
$conexion = mysqli_connect('localhost', 'root', '', 'clinica1');

// Obtener la fecha enviada por GET
$fecha = $_GET['fecha'];

// Consultar las citas para la fecha seleccionada
$resultado = mysqli_query($conexion, "SELECT fecha_examen, hora_examen FROM pacientes WHERE fecha_examen = '$fecha'");

// Obtener los resultados como un array asociativo
$citas = array();
while ($fila = mysqli_fetch_assoc($resultado)) {
	$citas[] = $fila;
}

// Devolver las citas como un objeto JSON
echo json_encode($citas);
?>