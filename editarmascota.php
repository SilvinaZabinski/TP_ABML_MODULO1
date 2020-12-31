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

$idmascota= $_GET['id'];
$sentencia = $mysqli->prepare("SELECT * FROM mascotas WHERE idmascota=$idmascota");
$sentencia->execute();
$resultado = $sentencia->get_result();
$fila = $resultado->fetch_assoc();

$nommascota = $fila["nommascota"];
$idespecie = $fila["idespecie"];
$idraza =$fila["idraza"]; 
$sexo = $fila["sexo"];
$pelaje = $fila["pelaje"];
$fechanacimiento= $fila["fechanacimiento"];
$señasparticulares = $fila["señasparticulares"];
$idpropietario =$fila["idpropietario"]; 
$estado = $fila["estado"];
?>


<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    
    <link href="diseveterinaria.css" rel="stylesheet" type="text/css" />
  </head>
<body>  
<form method="post" action="updatemascota.php"> 
<h1>Ingreso de datos de la Mascota</h1> 
  Nombre: <input type="text" name="nombre" value="<?php echo $nommascota; ?>"><br>

  <label for="especie">Especie:</label><br>
  <select name="idespecie" value="<?php echo $idespecie; ?>">
        <option value="0">Seleccione:</option>
        <?php
          $query = $mysqli -> query ("SELECT * FROM especies");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[idespecie].'">'.$valores[especie].'</option>';
          }
        ?>
      </select>
      <label for="raza">Raza:</label><br>
     <select name="idraza" value="<?php echo $idraza; ?>">
        <option value="0">Seleccione:</option>
        <?php
          $query = $mysqli -> query ("SELECT * FROM razas INNER Join especies ON  razas.idespecie = especies.idespecie");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[idraza].'">'.$valores[raza].'</option>';
          }
        ?>
      </select>   
     <label for="sexo">Sexo:</label><br>
     <select name="sexo" value="<?php echo $sexo; ?>">
       <option value="Hembra">Hembra</option>
       <option value="Macho">Macho</option>
     </select><br>

     Pelaje: <input type="text" name="pelaje" value="<?php echo $row['pelaje']; ?>"><br>
     Fecha de nacimiento: <input type="date" name="fechanacimiento" value="<?php echo $fechanacimiento; ?>"><br>
     Señas particulares: <input type="text" name="señasparticulares" value="<?php echo $señasparticulares; ?>"><br> 
     </select>
    <label for="idpropietario">Propietario:</label><br>
     <select name="idpropietario" value="<?php echo $idpropietario; ?>">
        <option value="0">Seleccione:</option>
        <?php
          $query = $mysqli -> query ("SELECT * FROM propietarios");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[idpropietario].'">'.$valores[nombre].'</option>';
          }
        ?>
      </select> 
     <label for="estado">Estado</label><br>
     <input type="checkbox" name="estado" value="<?php echo $estado; ?>">

    </div>
     <div class=boton>
    <a href="updatemascota.php">Guardar</a> 
    </div> 
    <div class=boton>
    <a href="pagmascota.php">Cancelar</a> 
    </div>  
</form>
</body>
</html>
