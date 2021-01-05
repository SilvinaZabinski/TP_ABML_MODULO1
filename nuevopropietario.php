<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "veterinaria";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $nombre = $_POST['nombre'];
  $direccion = $_POST['direccion'];
  $localidad= $_POST['localidad'];
  $telefono = $_POST['telefono'];
  $email = $_POST['email'];
  $estado = $_POST['estado'];

  echo "Conexión Exitosa";
  $sql = "INSERT INTO propietarios (nombre, direccion, localidad, telefono, email, estado)
  VALUES ('$nombre', '$direccion', '$localidad', '$telefono', '$email', '$estado')";


  if ($conn->query($sql) === TRUE) {
      echo " Nuevo Propietario Creado";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

  $conn->close();
?>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Nuevo Propietario</title>
    <link href="Css/index.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div class="boton">
	<a href="pagpropietario.php">Salir</a>
   </div>
    <script src="script.js"></script>
  </body>
</html>