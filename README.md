# Sitio Web de Reservas para Examenes Clinicos 🩺

Consiste en un formulario para agendar pacientes para exámenes médicos. Utiliza SweetAlert2 para mostrar mensajes. El formulario requiere que el usuario ingrese su nombre, fecha de nacimiento, número de teléfono, ubicación, correo electrónico y tipo de examen. Además, se debe elegir la fecha y la hora de la reserva, mientras que las opciones válidas se mostrarán después de una consulta a la base de datos usando AJAX. Por último, se facilitan los datos de contacto y ubicación del centro médico, así como un mapa de Google Maps dentro de un <iframe>.

Incluye un backoffice "agenda.php" para visualizar los usuarios agendados.

## Caso de uso: reserva de una misma fecha a la misma hora por dos usuarios
Tenemos dos usuarios, usuario_1 y usuario_2

usuario_2 quiere reservar para la fecha 24/03/2023 a la hora 9:00. Esa hora fue anteriormente reservada por usuario_1
Entonces la hora 9:00 para la fecha 24/03/2023 ya no aparecerá entre las opciones, se ofrecerá en su lugar, horas disponibles para reservar.

Se evita la reserva en simultáneo de dos o más usuarios para una determinada fecha a la misma hora.

## Faltantes:

Falta darle funcionalidad al menú; solo luce los encabezados pero no direcciona a ninguna parte del sitio.
Falta verificar que no se permita reservar fechas en fin de semana.
Falta agregar inicio de sesión a la página de backoffice "agenda.php"

## Prerrequisito:

Crear base de datos necesaria para este proyecto:


CREATE DATABASE IF NOT EXISTS clinica1;
  
USE clinica1;

CREATE TABLE IF NOT EXISTS pacientes (
  
  id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  
  nombre VARCHAR(50) NOT NULL,
  
  apellido VARCHAR(50) NOT NULL,
  
  fecha_nacimiento DATE,
  
  telefono_celular VARCHAR(15),
  
  localidad VARCHAR(50),
  
  correo VARCHAR(50),
  
  tipo_examen VARCHAR(100),
  
  fecha_examen DATE,
  
  hora_examen TIME
  
);
