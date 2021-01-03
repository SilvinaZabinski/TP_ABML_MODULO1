
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
$idespecie = $_POST['idespecie'];
$raza = $_POST['raza'];

$sql = "UPDATE razas SET idespecie='$idespecie', raza='$raza', WHERE idraza=$indice";

if ($mysqli->query($sql) === TRUE) {
    echo "Raza Modificada";
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
    <title>Se Modico la Raza</title>
    <link href="index.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div class=boton">
	<a href="pagraza.php">Salir</a>
   </div>
    <script src="script.js"></script>
  </body>
</html>