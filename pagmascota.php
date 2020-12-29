<html>
<head>
<style>
th
    {color: white;
     background-color: blue;
    }
</style>
<link href="index.css" rel="stylesheet" type="text/css" />
</head>
    <body>
        <h1>Alta, Baja y Modificaciones de Mascotas</h1>
        <table class="table table-striped table-bordered">
            <thead>
            <div class=boton>
            <a href="agregarmascota.php">Agregar</a><br>
            <br>
            </div>
            <tr>
            <th style='width:50px;'>ID</th>
            <th style='width:150px;'>Nombre</th>
            <th style='width:150px;'>Especie</th>
            <th style='width:150px;'>Raza</th>
            <th style='width:150px;'>Sexo</th>
            <th style='width:150px;'>Pelaje</th>
            <th style='width:100px;'>Fecha de Nacimiento</th>
            <th style='width:150px;'>Señas particulares</th>
            <th style='width:150px;'>Propietario</th>
            <th style='width:150px;'>Imagen</th>
            <th style='width:50px;'>Estado</th>
            <th style='width:70px;'>Editar</th>
            <th style='width:70px;'>Eliminar</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    //############## CONEXION A LA BASE ##############
                    $servername = "localhost";  
                    $username = "root";
                    $password = "";
                    $database = "veterinaria";
                    $mysqli = new mysqli($servername, $username, $password, $database);
                    if ($mysqli->connect_errno) {
                        echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                    }

                    //############## SI HUBO UN METODO GET Y ME TRAJO EL NUMERO DE PAGINA, LO USO. SI NO, ESTABLEZCO UNO POR DEFECTO (EMPEZANDO DEL PRINCIPIO) ##############
                    if (isset($_GET['pagina_nro']) && $_GET['pagina_nro'] != "") 
                    {
                        $paginaNro = $_GET['pagina_nro'];
                    } 
                    else 
                    {
                        $paginaNro = 1;
                    }

                    //############## DEFINO UN MAXIMO DE ELEMENTOS POR PAGINA ##############
                    $cantidadMaximaElementosPagina = 2;
                    
                    //############## CALCULO VALORES PARA LA PAGINACION ##############
                    $offset = ($paginaNro - 1) * $cantidadMaximaElementosPagina;
                    $paginaAnterior = $paginaNro - 1;
                    $paginaSiguiente = $paginaNro + 1;
                
                    //############## REALIZO LA CONSULTA PARA SABER CUANTOS ELEMENTOS HAY EN TOTAL ##############
                    $sentencia = $mysqli->prepare("SELECT COUNT(*) as cantidad FROM mascotas");
                    $sentencia->execute();
                    $resultado = $sentencia->get_result();
                    $fila = $resultado->fetch_assoc();

                    //############## GUARDO LA CANTIDAD TOTAL DE ELEMENTOS EN UNA VARIABLE ##############
                    $cantidadTotalElementos = $fila["cantidad"];

                    //############## CALCULO LA CANTIDAD DE PAGINAS QUE NECESITO ##############
                    $totalPaginas = ceil($cantidadTotalElementos / $cantidadMaximaElementosPagina);

                    //############## REALIZO LA CONSULTA PARA OBTENER SOLO LOS ELEMENTOS DE LA PAGINA ACTUAL ##############
                    $sentencia = $mysqli->prepare("SELECT * FROM mascotas LIMIT $offset, $cantidadMaximaElementosPagina");
                    $sentencia->execute();
                    $resultado = $sentencia->get_result();
                    $fila = $resultado->fetch_assoc();
                    
                    while($fila)
                    {
                        echo "  <tr>
                                    <td>".$fila['idmascota']."</td>
                                    <td>".$fila['nommascota']."</td>
                                    <td>".$fila['idespecie']."</td>
                                    <td>".$fila['idraza']."</td>
                                    <td>".$fila['sexo']."</td>
                                    <td>".$fila['pelaje']."</td>
                                    <td>".$fila['fechanacimiento']."</td>
                                    <td>".$fila['señasparticulares']."</td>
                                    <td>".$fila['idpropietario']."</td>
                                    <td>".$fila['imagen']."</td>
                                    <td>".$fila['estado']."</td>
                                    <td>Editar</td>
                                    <td>Eliminar</td>
                                   
                               </tr>";  
                        
                        $fila = $resultado->fetch_assoc();
                    }

                    mysqli_close($mysqli);
                ?>
            </tbody>
        </table>
        <div style='padding: 10px 20px 0px; border-top: dotted 1px #CC ;'>
            <strong>Pagina <?php echo $paginaNro." de ".$totalPaginas; ?></strong>
        </div>
        <tr class="pagination">
            <?php 
                if($paginaNro > 1)
                {
                    echo "<th><a href='?pagina_nro=1'>Primera Pagina</a></th>";
                } 
            ?>
            
            <th>
                <a <?php if($paginaNro > 1){ echo "href='?pagina_nro=$paginaAnterior'"; } ?>>Anterior</a>
            </th>
            
            <th>
                <a <?php if($paginaNro < $totalPaginas) { echo "href='?pagina_nro=$paginaSiguiente'";} ?>>Siguiente</a>
            </th>
        
            <?php 
                if($paginaNro < $totalPaginas)
                {
                    echo "<th><a href='?pagina_nro=$totalPaginas'>Ultima Pagina &rsaquo;&rsaquo;</a></li>";
                } 
            ?>
        </tr>
    </body>
    <br>
    <div class=boton>
    <a href="index.php">Salir</a>
    </div>
    <footer> &#169 Crea el Hábito 2020. todos los derechos reservados &#174.
  </footer>
</html>