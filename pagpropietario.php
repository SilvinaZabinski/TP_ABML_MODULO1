<html>
    <head>
    <style>
    th
        {color: white;
        background-color: tomato;
        }
    </style>
    <link href="css/pagpropietario.css" rel="stylesheet" type="text/css" />
    </head>
        <body>
        <h1>Alta, Baja y Modificaciones de Propietarios</h1>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                <th style='width:50px;'>ID</th>
                <th style='width:150px;'>Nombre</th>
                <th style='width:150px;'>Dirección</th>
                <th style='width:150px;'>Localidad</th>
                <th style='width:150px;'>Teléfono</th>
                <th style='width:150px;'>Email</th>
                <th style='width:50px;'>Estado</th>
                <th style='width:150px;'>Editar</th>
                <th style='width: 150px;'> Borrar</th>
                </tr>
                </thead>
                <div class="agregar">
                <a href="agregarpropietario.php">Agregar</a>
                </div>
                <br>
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
                        $sentencia = $mysqli->prepare("SELECT COUNT(*) as cantidad FROM propietarios");
                        $sentencia->execute();
                        $resultado = $sentencia->get_result();
                        $fila = $resultado->fetch_assoc();

                        //############## GUARDO LA CANTIDAD TOTAL DE ELEMENTOS EN UNA VARIABLE ##############
                        $cantidadTotalElementos = $fila["cantidad"];

                        //############## CALCULO LA CANTIDAD DE PAGINAS QUE NECESITO ##############
                        $totalPaginas = ceil($cantidadTotalElementos / $cantidadMaximaElementosPagina);

                        //############## REALIZO LA CONSULTA PARA OBTENER SOLO LOS ELEMENTOS DE LA PAGINA ACTUAL ##############
                        $sentencia = $mysqli->prepare("SELECT * FROM propietarios where estado = 1 LIMIT $offset, $cantidadMaximaElementosPagina");
                        $resultado = $sentencia->get_result();
                        $fila = $resultado->fetch_assoc();

                        while($fila)
                        {
                            echo "<tr>
                                    <td>".$fila['idpropietario']."</td>
                                    <td>".$fila['nombre']."</td>
                                    <td>".$fila['direccion']."</td>
                                    <td>".$fila['localidad']."</td>
                                    <td>".$fila['telefono']."</td>
                                    <td>".$fila['email']."</td>
                                    <td>".$fila['estado']."</td>
                                    <td><a href='editarpropietario.php?id=".$fila['idpropietario']."'><img src='Css/icono_editar.jpg' width='30' height='30'></a></td>
                                    <td><a href='eliminarpropietario.php?id=".$fila['idpropietario']."'><img src='Css/icono_eliminar.jpg'  width='30' height='30'></a></td>
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
                <th>
                    <?php 
                        if($paginaNro > 1)
                        {
                            echo "<th><a href='?pagina_nro=1'> <div class= 'pagina'> Primera Pagina </div></a></th>";
                        } 
                    ?>
                </th>
                <th>
                    <a class= "mover" <?php if($paginaNro > 1){ echo "href='?pagina_nro=$paginaAnterior'"; } ?>><img src='Css/icono_atras.jpg' width='30' height='30'></a>
                </th>
                
                <th>
                    <a class= "mover" <?php if($paginaNro < $totalPaginas) { echo "href='?pagina_nro=$paginaSiguiente'";} ?>><img src='Css/icono_siguiente.jpg' width='30' height='30'></a>
                </th>
                
                <th>
                    <?php 
                        if($paginaNro < $totalPaginas)
                        {
                            echo "<th><a href='?pagina_nro=$totalPaginas'> <div class= 'pagina'>Ultima Pagina </div></a>";
                        } 
                    ?>
                </th>
            </tr>
        </body>
        <br>
        <div class="salir">
        <a href="index.php">Salir</a>
        </div>
</html>
