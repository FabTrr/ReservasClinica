<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Backoffice</title>
  </head>
  <body>
    <?php
      // Establecer conexión a la base de datos
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "clinica1";
      $conn = new mysqli($servername, $username, $password, $dbname);

      // Verificar la conexión
      if ($conn->connect_error) {
        die("Fallo la conexión a la base de datos: " . $conn->connect_error);
      }

      // Query para selección de información de la tabla "pacientes"
      $sql = "SELECT nombre_apellido, fecha_nacimiento, telefono_celular, localidad, correo, tipo_examen, fecha_examen, hora_examen FROM pacientes";

      $result = $conn->query($sql);

      // Verificación de resultados y construcción de la tabla con los datos
      if ($result->num_rows > 0) {
        echo "<table><tr><th>Nombre y apellido</th><th>Fecha de nacimiento</th><th>Teléfono</th><th>Localidad</th><th>Correo</th><th>Tipo de examen</th><th>Fecha de examen</th><th>Hora de examen</th></tr>";

        while($row = $result->fetch_assoc()) {
          echo "<tr><td>".$row["nombre_apellido"]."</td><td>".$row["fecha_nacimiento"]."</td><td>".$row["telefono_celular"]."</td><td>".$row["localidad"]."</td><td>".$row["correo"]."</td><td>".$row["tipo_examen"]."</td><td>".$row["fecha_examen"]."</td><td>".$row["hora_examen"]."</td></tr>";
        }

        echo "</table>";
      } else {
        echo "No se encontraron resultados";
      }

      $conn->close();
    ?>
  </body>
</html>