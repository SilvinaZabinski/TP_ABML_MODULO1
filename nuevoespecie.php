<?php

$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "veterinaria";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$especie = $_POST['especie'];


echo "Conexión Exitosa";
 $sql = "INSERT INTO especies (especie)
VALUES ('$especie')";


if ($conn->query($sql) === TRUE) {
    echo "Nuevo registro creado";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

$conn->close();
?>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Nuevo Propietario</title>
    <link href="index.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div class=boton">
	<a href="pagespecie.php">Salir</a>
   </div>
    <script src="script.js"></script>
  </body>
</html>