!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    
    <link href="diseño.css" rel="stylesheet" type="text/css" />
  </head>
<body>  
<form method="post" action="nuevo.php"> 
<h1>Ingreso de datos de Alumnos</h1> 
  Nombre: <input type="text" name="nombre"><br>
  Dirección: <input type="direccion" name="direccion"><br>
  Fecha de nacimiento: <input type="date" name="fechanacimiento"><br>
  E-mail: <input type="email" name="email"><br>
  Teléfono: <input type="tel" name="telefono"><br>
  Website: <input type="url" name="website"><br>
  <label for="etiobservaciones">Observaciones:</label><br>
  <textarea name="observaciones" rows="5" cols="40"></textarea>
  <br>
  <input type="submit" value="Agregar">  
</form>
</body>
</html>
