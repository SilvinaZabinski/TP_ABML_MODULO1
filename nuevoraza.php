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
$idespecie = $_POST['idespecie'];
$raza = $_POST['raza'];



echo "Conexión Exitosa";
 $sql = "INSERT INTO razas (idespecie, raza)
VALUES ('$idespecie', '$raza')";


if ($conn->query($sql) === TRUE) {
    echo "Nueva Raza creada";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

$conn->close();
?>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Nueva Raza</title>
    <link href="index.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div class=boton">
	<a href="pagraza.php">Salir</a>
   </div>
    <script src="script.js"></script>
  </body>
</html>