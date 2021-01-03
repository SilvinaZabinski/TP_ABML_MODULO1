<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    
    <link href="diseveterinaria.css" rel="stylesheet" type="text/css" />
  </head>
<body>  
<form method="post" action="nuevopropietario.php"> 
<h1>Ingreso de datos del Propietario</h1> 
  Nombre: <input type="text" name="nombre"><br>
  Dirección: <input type="text" name="direccion"><br>
  Localidad: <input type="text" name="localidad"><br>
  Teléfono: <input type="tel" name="telefono"><br>
  E-mail: <input type="email" name="email"><br>
  <input type="radio" id="activo" name="estado" value=1>
      <label for="activo">Activo</label><br>
      <input type="radio" id="inactivo" name="estado" value=0>
      <label for="inactivo">Inactivo</label><br>
  <br>
  <input type="submit" value="Agregar"> <br> 
  <br>
  <div class=boton>
    <a href="pagpropietario.php">Salir</a>
    </div>
  </form>
</body>
</html>
