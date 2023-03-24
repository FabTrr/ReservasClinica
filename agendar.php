<?php
session_start();
// Conectar a la base de datos
$conexion = mysqli_connect('localhost', 'root', '', 'clinica1');

// Obtener datos enviados por POST

$nombre = $_POST['nombre'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$telefono_celular = $_POST['telefono_celular'];
$localidad = $_POST['localidad'];
$correo = $_POST['email'];
$tipo_examen = $_POST['tipo_examen'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];

// Verificar que la hora elegida esté disponible
$resultado = mysqli_query($conexion, "SELECT COUNT(*) as 'conteo' FROM pacientes WHERE fecha_examen = '$fecha' AND hora_examen = '$hora'");
$fila = mysqli_fetch_assoc($resultado);
if ($fila['conteo'] > 0) {
	// Si la hora ya está agendada, mostrar un mensaje de error
	echo "Lo sentimos, esa hora ya está agendada para la fecha seleccionada.";
} else {
	// Si la hora está disponible, insertar la nueva cita en la base de datos
	mysqli_query($conexion, "INSERT INTO pacientes (nombre_apellido, fecha_nacimiento, telefono_celular, localidad, correo, tipo_examen, fecha_examen, hora_examen) VALUES ('$nombre','$fecha_nacimiento','$telefono_celular','$localidad','$correo','$tipo_examen','$fecha', '$hora')");
	// Mostrar mensaje de confirmación
	// Procesamiento de los datos y almacenamiento del mensaje en una variable
	header('location: index.php');
	$_SESSION['msg'] = "Se reservó exitosamente la fecha $fecha a las $hora.";
	
}
?>