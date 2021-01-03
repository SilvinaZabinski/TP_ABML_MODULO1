<?php

$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "veterinaria";

// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}
echo "Conexión Exitosa <br>";

$id= $_GET['id'];

// Se puede  realizar un DELETE FROM mascotas WHERE idmascota=$id";//
$sql = "UPDATE mascotas SET estado = 0 WHERE idmascota = $id";
if ($mysqli->query($sql) === TRUE) {
    echo "Se eliminó la Mascota";
  } else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
  }
  
?>
$mysqli->close();
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Se eliminó la Mascota</title>
    <link href="index.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div class=boton">
	<a href="pagmascota.php">Salir</a>
   </div>
    <script src="script.js"></script>
  </body>
</html>