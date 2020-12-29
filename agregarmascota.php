<?php
$servername = "localhost";
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
<form method="post" action="nuevomascota.php"> 
<h1>Ingreso de datos de la Mascota</h1> 
  Nombre: <input type="text" name="nommascota"><br>

  <label for="idespecie">Especie:</label><br>
  <select name="idespecie">
        <option value="0">Seleccione:</option>
        <?php
          $query = $mysqli -> query ("SELECT * FROM especies");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores['idespecie'].'">'.$valores['especie'].'</option>';
                  }
        ?>
      </select>
      <label for="idraza">Raza:</label><br>
     <select name="idraza">
        <option value="0">Seleccione:</option>
        <?php
          $query = $mysqli -> query ("SELECT * FROM razas");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores['idraza'].'">'.$valores['raza'].'</option>';
          }
        ?>
      </select>   
     <label for="sexo">Sexo:</label><br>
     <select name="sexo">
       <option value="Hembra">Hembra</option>
       <option value="Macho">Macho</option>
     </select><br>

     Pelaje: <input type="text" name="pelaje"><br>
     Fecha de nacimiento: <input type="date" name="fechanacimiento"><br>
     Señas particulares: <input type="text" name="señasparticulares"><br> 
     </select>
    <label for="idpropietario">Propietario:</label><br>
     <select name="idpropietario">
        <option value="0">Seleccione:</option>
        <?php
          $query = $mysqli -> query ("SELECT * FROM propietarios");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores['idpropietario'].'">'.$valores['nombre'].'</option>';
          }
        ?>
      </select> 
     <label for="estado">Estado</label><br>
     <input type="checkbox" name="estado" value="1">
     <input type="submit" value="Agregar">
     <br>
    <div class=boton> <a href="pagmascota.php">Salir</a>
     </div>
</form>
</body>
</html>
