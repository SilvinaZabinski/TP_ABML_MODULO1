<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "veterinaria";

// Cear conexión
$mysqli = new mysqli($servername, $username, $password, $dbname);
// Chequear conexion
if ($mysqli->connect_error) {
  die("Falla de conexión: " . $mysqli->connect_error);
}


// Cerrar conexion
// mysqli_close($conn); 

$id= $_GET['id'];
$sentencia = $mysqli->prepare("SELECT * FROM especies WHERE idespecie=$id");
$sentencia->execute();
$resultado = $sentencia->get_result();
$fila = $resultado->fetch_assoc();

$idespecie = $fila['idespecie'];
$especie = $fila['especie'];
?>


<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    
    <link href="css/editarespecie.css" rel="stylesheet" type="text/css" />
  </head>
  <body>  
<form method="post" action="updateespecie.php"> 
<h1>Editar datos de Especie</h1> 
<input type="hidden" name="indice" value="<?php echo $idespecie;?>""><br>
  Especie: <input type="text" name="especie" value="<?php echo $especie;?>""><br>
  <input type="submit" value="Guardar cambios">
  <br>
  <div class=boton>
    <a href="pagespecie.php">Salir</a>
    </div>  
</form>
</body>
</html>
