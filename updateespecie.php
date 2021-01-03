
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
$especie = $_POST['especie'];


$sql = "UPDATE especies SET especie='$especie', WHERE idespecie='$indice'";

if ($mysqli->query($sql) === TRUE) {
    echo "Especie Modificada";
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
    <title>Se Modico la Especie</title>
    <link href="index.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div class=boton">
	<a href="pagespecie.php">Salir</a>
   </div>
    <script src="script.js"></script>
  </body>
</html>