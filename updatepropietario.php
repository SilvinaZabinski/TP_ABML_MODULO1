
<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "veterinaria";

// Crear conexión
$mysqli = new mysqli($servername, $username, $password, $dbname);
// Chequear conexion
if ($mysqli->connect_error) {
  die("Falla de conexión: " . $mysqli->connect_error);
}
echo "Conexión Exitosa <br>";

$indice= $_POST['indice'];
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$localidad = $_POST['localidad'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$estado = $_POST['estado'];

$sql = "UPDATE propietarios SET nombre='$nombre', direccion='$direccion', localidad='$localidad', telefono='$telefono', email='$email', estado='$estado' WHERE idpropietario=$indice";

if ($mysqli->query($sql) === TRUE) {
    echo "Propietario Modificado";
  } else {
    echo "Error: " . $sql . "<br>" . $$mysqli->error;
  }
// Cerrar conexion
// mysqli_close($conn); 
$mysqli->close();
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Se Modifico el Propietario</title>
    <link href="index.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div class=boton">
	<a href="pagpropietario.php">Salir</a>
   </div>
    <script src="script.js"></script>
  </body>
</html>