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
echo "Conexión Exitosa <br>";

$id= $_GET['id'];
 $sql = "DELETE FROM especies WHERE idespecie=$id";

if ($mysqli->query($sql) === TRUE) {
    echo "Se eliminó la Especie";
  } else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
  }
  
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Se eliminó la Especie</title>
    <link href="index.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div class=boton">
	<a href="pagespecie.php">Salir</a>
   </div>
    <script src="script.js"></script>
  </body>
</html>