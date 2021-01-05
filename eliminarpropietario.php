
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
// Se puede  realizar un DELETE FROM propietarios WHERE idpropietario=$id";//
// Cambia el estado de 1 a 0//
$sql = "UPDATE propietarios SET estado = 0 WHERE idpropietario = $id";


if ($mysqli->query($sql) === TRUE) {
    echo "Se eliminó el propietario";
  } else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
  }
  
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Se eliminó el Propietario</title>
    <link href="Css/abm.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div class="boton">
	<a href="pagpropietario.php">Salir</a>
   </div>
  </body>
</html>