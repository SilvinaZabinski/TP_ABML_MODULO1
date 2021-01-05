<html>
<head>

<link href="css/padraza.css" rel="stylesheet" type="text/css" />
</head>
    <body>
        <h1>Alta, Baja y Modificaciones de Razas</h1>
        <table class="table table-striped table-bordered">
            <thead>
            <div class="agregar">
            <a href="agregarraza.php">Agregar</a><br>
            <br>
            </div>
            <tr>
            <th style='width:50px;'>Idraza</th>
            <th style='width:150px;'>Especie</th>
            <th style='width:150px;'>Raza</th>
            <th style='width:150px;'>Imagen</th>
            <th style='width:150px;'>Editar</th>
            <th style='width:150px;'>Borrar</th>
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
                    $cantidadMaximaElementosPagina = 5;
                    
                    //############## CALCULO VALORES PARA LA PAGINACION ##############
                    $offset = ($paginaNro - 1) * $cantidadMaximaElementosPagina;
                    $paginaAnterior = $paginaNro - 1;
                    $paginaSiguiente = $paginaNro + 1;
                
                    //############## REALIZO LA CONSULTA PARA SABER CUANTOS ELEMENTOS HAY EN TOTAL ##############
                    $sentencia = $mysqli->prepare("SELECT COUNT(*) as cantidad FROM razas");
                    $sentencia->execute();
                    $resultado = $sentencia->get_result();
                    $fila = $resultado->fetch_assoc();

                    //############## GUARDO LA CANTIDAD TOTAL DE ELEMENTOS EN UNA VARIABLE ##############
                    $cantidadTotalElementos = $fila["cantidad"];

                    //############## CALCULO LA CANTIDAD DE PAGINAS QUE NECESITO ##############
                    $totalPaginas = ceil($cantidadTotalElementos / $cantidadMaximaElementosPagina);

                    //############## REALIZO LA CONSULTA PARA OBTENER SOLO LOS ELEMENTOS DE LA PAGINA ACTUAL ##############
                    //$sentencia = $mysqli->prepare("SELECT * FROM razas LIMIT $offset, $cantidadMaximaElementosPagina");
                    $sentencia = $mysqli->prepare("SELECT r.idraza, e.especie, r.raza, r.imagenraza FROM razas r Left Join especies e on r.idespecie = e.idespecie LIMIT $offset, $cantidadMaximaElementosPagina");
                    $sentencia->execute();
                    $resultado = $sentencia->get_result();
                    $fila = $resultado->fetch_assoc();

                    while($fila)
                    {
                        echo "  <tr>
                                    <td>".$fila['idraza']."</td>
                                    <td>".$fila['especie']."</td>
                                    <td>".$fila['raza']."</td>
                                    <td>".$fila['imagenraza']."</td>
                                    <td><a href='editarraza.php?id=".$fila['idraza']."'><img src='Css/icono_editar.jpg' width='30' height='30'></a></td>
                                    <td><a href='eliminarraza.php?id=".$fila['idraza']."'><img src='Css/icono_eliminar.jpg'  width='30' height='30'></a></td>
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
                    echo "<th><a href='?pagina_nro=1'><div class= 'pagina'> Primera Pagina </div></a></th>";
                } 
            ?>
            
            <th>
                <a class= "mover" <?php if($paginaNro > 1){ echo "href='?pagina_nro=$paginaAnterior'"; } ?>><img src='Css/icono_atras.jpg' width='30' height='30'></a>
            </th>
            
            <th>
                <a class="mover" <?php if($paginaNro < $totalPaginas) { echo "href='?pagina_nro=$paginaSiguiente'";} ?>><img src='Css/icono_siguiente.jpg' width='30' height='30'></a>
            </th>
        
            <?php 
                if($paginaNro < $totalPaginas)
                {
                    echo "<th><a href='?pagina_nro=$totalPaginas'> <div class= 'pagina'>Ultima Pagina </div></a>";
                } 
            ?>
        </tr>
    </body>
    <br>
  <div class="salir">
    <a href="index.php">Salir</a>
    </div>
</html>
