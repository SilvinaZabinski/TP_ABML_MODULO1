
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "veterinaria";

// Crear conexión
$mysqli = new mysqli($servername, $username, $password, $dbname);
// Chequear conexion
if ($mysqli->connect_error) {
  die("Falla de conexión: " . $mysqli->connect_error);
}


$indice= $_POST['indice'];
$nombre = $_POST['nombre'];
$idespecie = $_POST['idespecie'];
$idraza = $_POST['idraza'];
$sexo = $_POST['sexo'];
$pelaje = $_POST['pelaje'];
$fechanacimiento = $_POST['fechanacimiento'];
$señasparticulares = $_POST['señasparticulares'];
$idpropietario = $_POST['idpropietario'];
$estado = $_POST['estado'];

$sql = "UPDATE mascotas SET nommascota='$nombre', idespecie='$idespecie', idraza='$idraza', sexo='$sexo', pelaje='$pelaje', fechanacimiento='$fechanacimiento', señasparticulares='$señasparticulares', idpropietario='$idpropietario', estado='$estado' WHERE idmascota=$indice";

if ($mysqli->query($sql) === TRUE) {
    echo "Mascota Modificada";
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
    <title>Se Modifico la Mascota</title>
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