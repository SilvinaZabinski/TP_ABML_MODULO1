
<html>
<head>
<meta charset="utf-8">
<title>Mascotas Spunky</title>
<link href="Css/pagmascotas.css" rel="stylesheet" type="text/css" />
</head>
    <body>
        <h1 class="personalizado">Alta, Baja y Modificaciones de Mascotas</h1>
        <table class="table table-striped table-bordered">
            <thead>
            <div class=boton>
            <a class="agregar" href="agregarmascota.php">Agregar</a>
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
                    $cantidadMaximaElementosPagina = 5;
                    
                    //############## CALCULO VALORES PARA LA PAGINACION ##############
                    $offset = ($paginaNro - 1) * $cantidadMaximaElementosPagina;
                    $paginaAnterior = $paginaNro - 1;
                    $paginaSiguiente = $paginaNro + 1;
                
                    //############## REALIZO LA CONSULTA PARA SABER CUANTOS ELEMENTOS HAY EN TOTAL ##############
                    $sentencia = $mysqli->prepare("SELECT COUNT(*) as cantidad FROM mascotas where estado = 1 ");
                    $sentencia->execute();
                    $resultado = $sentencia->get_result();
                    $fila = $resultado->fetch_assoc();

                    //############## GUARDO LA CANTIDAD TOTAL DE ELEMENTOS EN UNA VARIABLE ##############
                    $cantidadTotalElementos = $fila["cantidad"];

                    //############## CALCULO LA CANTIDAD DE PAGINAS QUE NECESITO ##############
                    $totalPaginas = ceil($cantidadTotalElementos / $cantidadMaximaElementosPagina);

                    //############## REALIZO LA CONSULTA PARA OBTENER SOLO LOS ELEMENTOS DE LA PAGINA ACTUAL ##############
                    $sentencia = $mysqli->prepare("SELECT m.idmascota, m.nommascota, e.especie, r.raza, m.sexo, m.pelaje, m.fechanacimiento, m.señasparticulares, p.nombre, m.imagen, m.estado FROM mascotas m Left Join propietarios p ON m.idpropietario = p.idpropietario Left Join especies e on m.idespecie = e.idespecie Left Join razas r on m.idraza = r.idraza where m.estado = 1  LIMIT $offset, $cantidadMaximaElementosPagina");
                    $sentencia->execute();
                    $resultado = $sentencia->get_result();
                    $fila = $resultado->fetch_assoc();
                    
                    while($fila)
                    {
                        echo "  <tr>
                                    <td  >".$fila['idmascota']."</td>
                                    <td>".$fila['nommascota']."</td>
                                    <td>".$fila['especie']."</td>
                                    <td>".$fila['raza']."</td>
                                    <td>".$fila['sexo']."</td>
                                    <td>".$fila['pelaje']."</td>
                                    <td>".$fila['fechanacimiento']."</td>
                                    <td>".$fila['señasparticulares']."</td>
                                    <td>".$fila['nombre']."</td>
                                    <td>".$fila['imagen']."</td>
                                    <td>".$fila['estado']."</td>
                                    <td><a href='editarmascota.php?id=".$fila['idmascota']."'><img src='Css/icono_editar.jpg' width='30' height='30'></a></td>
                                    <td><a href='eliminarmascota.php?id=".$fila['idmascota']."'><img src='Css/icono_eliminar.jpg' width='30' height='30'></a></td>
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
                <a class="mover" <?php if($paginaNro > 1){ echo "href='?pagina_nro=$paginaAnterior'"; } ?>><img src='Css/icono_atras.jpg' width='30' height='30'></a>
            </th>
            
            <th>
                <a class="mover" <?php if($paginaNro < $totalPaginas) { echo "href='?pagina_nro=$paginaSiguiente'";} ?>><img src='Css/icono_siguiente.jpg' width='30' height='30'></a>
            </th>
        
            <?php 
                if($paginaNro < $totalPaginas)
                {
                    echo "<th ><a href='?pagina_nro=$totalPaginas'> <div class= 'pagina'>Ultima Pagina </div></a></li>";
                } 
            ?>
        </tr>
    </body>
    <br>
    <div >
    <a class="salir" href="index.php">SALIR</a>
    </div>	
</html>
