<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "veterinaria";

// Cear conexión
$mysqli = new mysqli($servername, $username, $password, $dbname);
// Chequear conexion
if ($mysqli->connect_error) {
  die("Falla de conexión: " . $mysqli->connect_error);
}
echo "Conexión Exitosa <br>";

// Cerrar conexion
// mysqli_close($conn); 

$id= $_GET['id'];
$sentencia = $mysqli->prepare("SELECT * FROM razas WHERE idraza=$id");
$sentencia->execute();
$resultado = $sentencia->get_result();
$fila = $resultado->fetch_assoc();

$idraza= $fila["idraza"];
$idespecie = $fila["idespecie"];
$raza = $fila["raza"];
?>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    
    <link href="diseveterinaria.css" rel="stylesheet" type="text/css" />
  </head>
  <body>  
  <form method="post" action="updateraza.php"> 
   <h1>Editar datos de Raza</h1> 
   <input type="hidden" name="indice" value="<?php echo $idraza;?>"><br>
  <label for="especie">Especie:</label><br>
  <select name="idespecie" value="<?php echo $idespecie;?>">
        <option value="0">Seleccione:</option>
        <?php
          $query = $mysqli -> query ("SELECT * FROM especies");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores['idespecie'].'">'.$valores['especie'].'</option>';
          }
        ?>
      </select>
     
  Raza: <input type="text" name="raza" value="<?php echo $raza;?>"><br>
  <input type="submit" value="Guardar cambios">
  <br>
  <div class=boton>
    <a href="pagraza.php">Salir</a>
    </div>  
</form>
</body>
</html>
