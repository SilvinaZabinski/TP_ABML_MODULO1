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
$id= $_GET['id'];

// Se puede  realizar un DELETE FROM mascotas WHERE idmascota=$id";//
$sql = "UPDATE mascotas SET estado = 0 WHERE idmascota = $id";
if ($mysqli->query($sql) === TRUE) {
    echo "Se eliminó la Mascota"; 
  } else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
  }
  
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title> Mascota eliminada.</title> 
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