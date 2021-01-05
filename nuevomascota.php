<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "veterinaria";

// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}


$nombre = $_POST['nombre'];
$idespecie = $_POST['idespecie'];
$idraza = $_POST['idraza'];
$sexo = $_POST['sexo'];
$pelaje = $_POST['pelaje'];
$fechanacimiento = $_POST['fechanacimiento'];
$señasparticulares = $_POST['señasparticulares'];
$idpropietario = $_POST['idpropietario'];
$estado = $_POST['estado'];


 $sql = "INSERT INTO mascotas (nommascota, idespecie, idraza, sexo, pelaje, fechanacimiento, señasparticulares, idpropietario, estado)
VALUES ('$nombre', '$idespecie', '$idraza', '$sexo', '$pelaje', '$fechanacimiento', '$señasparticulares', '$idpropietario', '$estado')";


if ($mysqli->query($sql) === TRUE) {
    echo "Nueva Mascota Creada";
  } else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
  }

$mysqli->close();
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Nueva Mascota</title>
    <link href="Css/abm.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
  <br>
  <br>
    <div class="boton">
	<a href="pagmascota.php">Salir</a>
   </div>
   
  </body>
</html>