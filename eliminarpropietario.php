
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
// Se puede  realizar un DELETE FROM propietarios WHERE idpropietario=$id";//
// Cambia el estado de 1 a 0//
$sql = "UPDATE propietarios SET estado = 0 WHERE idpropietario = $id";


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
    <title>Se eliminó el Propietario</title>
    <link href="index.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div class=boton">
	<a href="pagpropietario.php">Salir</a>
   </div>
    <script src="script.js"></script>
  </body>
</html>