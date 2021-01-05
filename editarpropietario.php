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
echo "Conexión Exitosa <br>";

// Cerrar conexion
// mysqli_close($conn); 

$id= $_GET['id'];
$sentencia = $mysqli->prepare("SELECT * FROM propietarios WHERE idpropietario=$id");
$sentencia->execute();
$resultado = $sentencia->get_result();
$fila = $resultado->fetch_assoc();

$idmascota= $fila['idmascota'];
$idpropietario= $fila['idpropietario'];
$nombre = $fila['nombre'];
$direccion = $fila['direccion'];
$localidad= $fila['localidad'];
$telefono = $fila['telefono'];
$email = $fila['email'];
$estado = $fila['estado'];
?>


<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    
    <link href="diseveterinaria.css" rel="stylesheet" type="text/css" />
  </head>
  <body>  
<form method="post" action="updatepropietario.php"> 
<h1>Editar datos del Propietario</h1> 
 <input type="hidden" name="indice" value="<?php echo $idpropietario;?>"><br>
  Nombre: <input type="text" name="nombre" value="<?php echo $nombre;?>"><br>
  Dirección: <input type="text" name="direccion" value="<?php echo $direccion;?>" ><br>
  Localidad: <input type="text" name="localidad" value="<?php echo $localidad;?>"><br>
  Teléfono: <input type="tel" name="telefono" value="<?php echo $telefono;?>"><br>
  E-mail: <input type="email" name="email" value="<?php echo $email;?>"><br>
  
  </select> 
      <input type="radio" id="activo" name="estado" value="1" <?php if ($estado=="1") echo "checked";?>>
      <label for="activo">Activo</label><br>
      <input type="radio" id="inactivo" name="estado" value="0" <?php if ($estado=="0") echo "checked";?>>
      <label for="inactivo">Inactivo</label><br>
  <br>
  <input type="submit" value="Guardar cambios"> <br> 
  <br>
  <div class=boton>
    <a href="pagpropietario.php">Salir</a>
    </div>
  </form>
</body>
</html>
     <input type="submit" value="Guardar Cambios">
    <div class=boton>
    <a href="pagpropietario.php">Cancelar</a> 
    </div>  
</form>
</body>
</html>
