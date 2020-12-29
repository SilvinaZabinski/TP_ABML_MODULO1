<?php
$servername = "localhost:3306";
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
    
    <link href="diseveterinaria.css" rel="stylesheet" type="text/css" />
  </head>
<body>  
<form method="post" action="nuevoraza.php"> 
<h1>Ingreso de datos de Raza</h1> 
  

  <label for="especie">Especie:</label><br>
  <select name="idespecie">
        <option value="0">Seleccione:</option>
        <?php
          $query = $mysqli -> query ("SELECT * FROM especies");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[idespecie].'">'.$valores[especie].'</option>';
          }
        ?>
      </select>
     
  Raza: <input type="text" name="raza"><br>
  <input type="submit" value="Agregar">
  <br>
  <div class=boton>
    <a href="pagraza.php">Salir</a>
    </div>  
</form>
</body>
</html>