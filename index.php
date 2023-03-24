<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Incluye SweetAlert2 CSS y JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.4/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.4/sweetalert2.min.js"></script>

	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reservas para Examenes Clinicos</title>
</head>
<body>
<?php 
   session_start();
   if(isset($_SESSION['msg'])){
       $msg = $_SESSION['msg'];
       unset($_SESSION['msg']);

       // Genera un código HTML con el mensaje
       $html = '<div>' . $msg . '</div>';

       // Muestra el mensaje en un popup utilizando SweetAlert2
       echo "<script>
                Swal.fire({
                  title: '¡Reserva realizada!',
                  html: '$html',
                  icon: 'success'
                });
             </script>";
   }
?>
<header>
    <img src="banner.png" alt="Reservas para examenes clinicos">
  </header>
  <div class="contenido">
    <nav>
      <ul>
        <li><a href="#">Inicio</a></li>
        <li><a href="#">Acerca de</a></li>
        <li><a href="#">Exámenes</a></li>
        <li><a href="#">Ubicación</a></li>
        <li><a href="#">Cómo Reservar</a></li>
        <li><a href="#">Contacto</a></li>
      </ul>
    </nav>
  
  <h1>Bienvenidos a Clínica Médica</h1>
  <p>Aquí puede reservar una fecha para su examen</p>
  <p>Contamos con varios estudios de acuerdo a sus necesidades</p>
  <p>Resultados en el día</p>
  
  
	<h1>Reservar una fecha</h1>
	<form action="agendar.php" method="post" id="formulario">
        <div>
            <label for="fecha">¿Cuando quiere realizar su examen?:</label>
            <br>
            <input type="date" id="fecha" name="fecha" required>
        </div>
        <div>
            <label for="hora">Seleccionar hora (entre lun y vie 9 a 16 hs, sabados 9 a 12 hs):</label><br>
            <select id="hora" name="hora">
                <option value="9:00">9:00</option>
                <option value="10:00">10:00</option>
                <option value="11:00">11:00</option>
                <option value="12:00">12:00</option>
                <option value="13:00">13:00</option>
                <option value="14:00">14:00</option>
                <option value="15:00">15:00</option>
                <option value="16:00">16:00</option>
            </select>
        </div>
		
        <div>
            <label for="nombre">Nombre y Apellidos:</label>
            <input type="text" id="nombre" name="nombre" required>
          </div>
          <div>
            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
          </div>
          <div>
            <label for="telefono_celular">Teléfono Celular:</label>
            <input type="tel" id="telefono_celular" name="telefono_celular" required>
          </div>
          <div>
            <label for="localidad">Localidad:</label>
            <input type="text" id="localidad" name="localidad" required>
          </div>
          <div>  
            <label for="email">Correo electrónico:</label>
            <input type="email" id="email" name="email" required>
          </div>
          <div>
            <label for="tipo_examen">Tipo de examen:</label>
            <select id="tipo_examen" name="tipo_examen" required>
              <option value="Psicofísico Libreta de Conducir Amateur">Psicofísico Libreta de Conducir Amateur</option>
              <option value="Evaluación Médica y Psicológica Porte y Tenencia">Evaluación Médica y Psicológica Porte y Tenencia</option>
              <option value="Psicotécnico para Libreta Profesional">Psicotécnico Libreta Profesional</option>
            </select>
          </div>
          <br>
		<button type="submit">Reservar</button>
    <script>function limpiarFormulario() {
      document.getElementById("formulario").reset();
    }
    </script>
    <button type="limpiar" onclick="limpiarFormulario()">Limpiar</button>
    
	</form>
	<script>
		// Función para validar horas disponibles
		function validarHoras() {
			// Obtener fecha y hora seleccionadas
			var fecha = document.getElementById('fecha').value;
			var hora = document.getElementById('hora').value;

			// Crear objeto AJAX para hacer la consulta a la base de datos
			var xhr = new XMLHttpRequest();
			xhr.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {
					// Parsing de la respuesta JSON
					var citas = JSON.parse(this.responseText);
					// Filtrar las horas ya agendadas para la fecha seleccionada
					var horas_disponibles = ['9:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00'].filter(function (hora) {
						return !citas.find(function (cita) {
							return cita.fecha_examen === fecha && cita.hora_examen === hora;
						})
					});
					// Actualizar las opciones del select con las horas disponibles
					var select = document.getElementById('hora');
					select.options.length = 0;
					horas_disponibles.forEach(function (hora) {
						select.options.add(new Option(hora, hora));
					});
				}
			};
			// Hacer la consulta a la base de datos
			xhr.open('GET', 'consultar.php?fecha=' + fecha, true);
			xhr.send();
		}

		// Asignar la función de validación al cambiar la fecha
		document.getElementById('fecha').addEventListener('change', validarHoras);
	</script>
</div>  
<h1>Ubicación</h1>
<p>Calle Lorem Esq. Ipsun, 123</p>
  <p>Tel.: 23333332</p>
  <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d176467.69851156155!2d-56.298745534039625!3d-34.73013786099634!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2suy!4v1679615007932!5m2!1ses-419!2suy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </body>
</html>