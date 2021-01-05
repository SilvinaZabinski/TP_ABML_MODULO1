<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Agregar nuevo propietario</title>
    <link href="Css/editarpropietario.css" rel="stylesheet" type="text/css" />
    <style>
      .error {color: #FF0000;}
    </style>
  </head>
  <body>  
    <?php
      $nombreErr = $direccionErr = $localidadErr = $telefonoErr = $emailErr = $estadoErr = "";
      $nombre = $direccion = $localidad = $telefono = $email = $estado = "";

      if ($_SERVER["REQUEST_METHOD"]=="POST"){
        if (empty($_POST["nombre"])) {
          $nombreErr = "Name is required";
        } else {
          $nombre = test_input($_POST["nombre"]);
        }
        if (empty($_POST["direccion"])) {
          $direccionErr = "Direccion requerida";
        } else {
            $direccion = test_input($_POST["direccion"]);
        }
        if (empty($_POST["localidadd"])) {
          $localidadErr = "Localidad requerida";
        } else {
            $localidad = test_input($_POST["localidad"]);
        }
        if (empty($_POST["telefono"])) {
          $telefonoErr = "Telefono requerido";
        } else {
            $telefono = test_input($_POST["telefono"]);
        }
        if (empty($_POST["email"])) {
          $emailErr = "Email requerido";
        } else {
          $email = test_input($_POST["email"]);
          
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $emailErr = "Formato de email invalido";
          }
        }
        if (empty($_POST["estado"])) {
          $estadoErr = "Estado requerido";
        } else {
            $estado = test_input($_POST["estado"]);
        }
        function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }
      }
    ?>

    <form method="post" action="nuevopropietario.php">
      <h1>Ingreso de datos del Propietario</h1> 
      <p><span class="error">* Campos obligatorios</span></p>
      <p class="labels">Nombre:</p> <input type="text" name="nombre" required="">
        <span class="error"> * <?php echo $nombreErr;?></span><br>
      <p class="labels">Dirección:</p> <input type="text" name="direccion" required="">
        <span class="error"> * <?php echo $direccionErr;?><br>
      <p class="labels">Localidad: </p><input type="text" name="localidad" required="">
        <span class="error"> * <?php echo $localidadErr;?><br>
      <p class="labels">Teléfono: </p><input type="tel" name="telefono" required="">
        <span class="error"> * <?php echo $telefonoErr;?><br>
      <p class="labels">E-mail: </p><input type="email" name="email" required="">
        <span class="error"> * <?php echo $emailErr;?><br>
      <div class="radio-estado">
        <label for="activo">Activo</label>
        <input type="radio" id="activo" name="estado" value=activo <?php if (isset($estado) && $estado=="activo") echo "checked";?> >
        <label for="inactivo">Inactivo</label>
        <input type="radio" id="inactivo" name="estado" value=inactivo>
        <span class="error"> * <?php echo $estadoErr;?><br>  
      </div>
      
      <input type="submit" value="Agregar"> <br>
      <br>
      <div class="boton">
        <a href="pagpropietario.php">Salir</a>
      </div>
    </form>
  </body>
</html>
