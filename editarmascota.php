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

<<<<<<< HEAD
$id= $_GET['id'];
$sentencia = $mysqli->prepare("SELECT * FROM mascotas WHERE idmascota=$id");
=======
$idmascota= $_GET['id'];
$sentencia = $mysqli->prepare("SELECT * FROM mascotas WHERE idmascota=$idmascota");
>>>>>>> 935059a6d8cd54088cf4146d4dd2e37038814a47
$sentencia->execute();
$resultado = $sentencia->get_result();
$fila = $resultado->fetch_assoc();

<<<<<<< HEAD
$idmascota = $fila["idmascota"];
$nombre = $fila["nommascota"];
=======
$nommascota = $fila["nommascota"];
>>>>>>> 935059a6d8cd54088cf4146d4dd2e37038814a47
$idespecie = $fila["idespecie"];
$idraza =$fila["idraza"]; 
$sexo = $fila["sexo"];
$pelaje = $fila["pelaje"];
$fechanacimiento= $fila["fechanacimiento"];
$señasparticulares = $fila["señasparticulares"];
$idpropietario =$fila["idpropietario"]; 
<<<<<<< HEAD
$estado= $fila["estado"];
=======
$estado = $fila["estado"];
>>>>>>> 935059a6d8cd54088cf4146d4dd2e37038814a47
?>


<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    
    <link href="diseveterinaria.css" rel="stylesheet" type="text/css" />
  </head>
<<<<<<< HEAD
  <body>  
<form action="updatemascota.php" method="post" > 
<h1>Editar datos de la Mascota</h1> 
 
  <input type="hidden" name="indice" value="<?php echo $idmascota;?>"><br>
  Nombre: <input type="text" name="nombre" value="<?php echo $nombre;?>"><br>

  <label for="especie">Especie:</label><br>
  <select name="idespecie" value="<?php echo $idespecie;?>">
=======
<body>  
<form method="post" action="updatemascota.php"> 
<h1>Ingreso de datos de la Mascota</h1> 
  Nombre: <input type="text" name="nombre" value="<?php echo $nommascota; ?>"><br>

  <label for="especie">Especie:</label><br>
  <select name="idespecie" value="<?php echo $idespecie; ?>">
>>>>>>> 935059a6d8cd54088cf4146d4dd2e37038814a47
        <option value="0">Seleccione:</option>
        <?php
          $query = $mysqli -> query ("SELECT * FROM especies");
          while ($valores = mysqli_fetch_array($query)) {
                 echo '<option value="'.$valores[idespecie].'">'.$valores[especie].'</option>';
                }
        ?>
      </select>
      <label for="raza">Raza:</label><br>
<<<<<<< HEAD
     <select name="idraza" value="<?php echo $idraza;?>">
=======
     <select name="idraza" value="<?php echo $idraza; ?>">
>>>>>>> 935059a6d8cd54088cf4146d4dd2e37038814a47
        <option value="0">Seleccione:</option>
        <?php
          $query = $mysqli -> query ("SELECT * FROM razas INNER Join especies ON  razas.idespecie = especies.idespecie");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[idraza].'">'.$valores[raza].'</option>';
          }
        ?>
      </select>   
     <label for="sexo">Sexo:</label><br>
<<<<<<< HEAD
     
     <select name="sexo" value="<?php echo $sexo; ?>">
       <option value="Hembra" <?php if ($sexo=="Hembra") echo "selected";?>>Hembra</option>
       <option value="Macho" <?php if ($sexo=="Macho") echo "selected";?>>Macho</option>
=======
     <select name="sexo" value="<?php echo $sexo; ?>">
       <option value="Hembra">Hembra</option>
       <option value="Macho">Macho</option>
>>>>>>> 935059a6d8cd54088cf4146d4dd2e37038814a47
     </select><br>

     Pelaje: <input type="text" name="pelaje" value="<?php echo $pelaje; ?>"><br>
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
<<<<<<< HEAD
      <input type="radio" id="activo" name="estado" value="1" <?php if ($estado=="1") echo "checked";?>>
      <label for="activo">Activo</label><br>
      <input type="radio" id="inactivo" name="estado" value="0" <?php if ($estado=="0") echo "checked";?>>
      <label for="inactivo">Inactivo</label><br>
     
     <input type="submit" value="Guardar Cambios">
    
=======
     <label for="estado">Estado</label><br>
     <input type="checkbox" name="estado" value="<?php echo $estado; ?>">

    </div>
     <div class=boton>
    <a href="updatemascota.php">Guardar</a> 
    </div> 
>>>>>>> 935059a6d8cd54088cf4146d4dd2e37038814a47
    <div class=boton>
    <a href="pagmascota.php">Cancelar</a> 
    </div>  
</form>
</body>
</html>
