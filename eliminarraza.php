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
 $sql = "DELETE FROM razas WHERE idraza=$id";

if ($mysqli->query($sql) === TRUE) {
    echo "Se eliminó la Raza";
  } else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
  }
  
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Se eliminó la Raza</title>
    <link href="Css/abm.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div class=boton>
	<a href="pagraza.php">Salir</a>
   </div>
    
  </body>
</html>