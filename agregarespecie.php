<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "veterinaria";

// Cear conexión
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Chequear conexion
if ($mysqli->connect_error) {
  die("Falla de conexión: " . $conn->connect_error);
}
echo "Conexión Exitosa <br>";

// Cerrar conexion
// mysqli_close($conn); 
?>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link href="Css/diseveterinaria.css" rel="stylesheet" type="text/css" />
  </head>
<body>  
<form method="post" action="nuevoespecie.php"> 
<h1>Ingreso de datos de Especies</h1> 
  Especie: <input type="text" name="especie"><br>
  <input type="submit" value="Agregar">
  <br>
  <div class=boton>
    <a href="pagespecie.php">Salir</a>
    </div>  
</form>
</body>
</html>