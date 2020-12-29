<?php

$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "veterinaria";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$nommascota = $_POST['nommascota'];
$idespecie = $_POST['idespecie'];
$idraza = $_POST['idraza'];
$sexo = $_POST['sexo'];
$pelaje = $_POST['pelaje'];
$fechanacimiento = $_POST['fechanacimiento'];
$señasparticulares = $_POST['señasparticulares'];
$idpropietario = $_POST['idpropietario'];
$estado = $_POST['estado'];

echo "Conexión Exitosa";
 $sql = "INSERT INTO mascotas (nommascota, idespecie, idraza, sexo, pelaje, fechanacimiento, señasparticulares, idpropietario, estado)
VALUES ('$nommascota', '$idespecie', '$idraza', '$sexo', '$pelaje', '$fechanacimiento', '$señasparticulares', '$idpropietario', '$estado')";


if ($conn->query($sql) === TRUE) {
    echo "Nuevo registro creado";
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
    <link href="index.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div class=boton>
	<a href="pagmascota.php">Salir</a>
   </div>
    <script src="script.js"></script>
  </body>
</html>