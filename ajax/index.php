<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <script>
        function peticionGet() {
            xmlhttp = new XMLHttpRequest();

            
            var fechaInicio = document.getElementById('fechaInicial').value;
            var fechaDevolucion = document.getElementById('fechaFinal').value;
            var estado = document.getElementById('estado').value;
            var fecha = document.querySelector('input[name="fecha"]:checked').value;
            var usuario = document.getElementById('CBUsuario').value;
            var libro = document.getElementById('CBLibro').value;

            var url = "filtro.php?estado=" + estado + "&fecha=" + fecha + "&fechaInicio=" + fechaInicio + "&fechaDevolucion=" + fechaDevolucion + "&usuario=" + usuario + "&libro=" + libro;
            xmlhttp.open('GET', url, true);
            xmlhttp.send(null);
            xmlhttp.onreadystatechange = function () {

                if (xmlhttp.readyState == 4) {//estado Listo!
                    if (xmlhttp.status == 200) {//Recarga exitosa
                        document.getElementById('divContenedor').innerHTML = xmlhttp.responseText;
                    } else {
                        alert("Error ->" + xmlhttp.responseText);
                    }
                }
            };
        }
    </script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilo.css">
    <title>Préstamo de Libros</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Inicio</a>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="registrarUsuario.php">Usuario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="registrarAutor.php">Autores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="registrarLibro.php">Libros</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar -->
    <!-- Contenido -->
    <?php
        $conexion = new mysqli("localhost","root","","prestamoLibros");

        if ($conexion->connect_error) {
            die("Connection failed: " . $conexion->connect_error);
        }
        
    ?>
    <section class="contenido">
        <div class="container-md p-2 text-center d-grid gap-2 d-md-block">
            <h2>Préstamo de libros</h2>
            <button class="btn btn-success" onclick="location.href='registrarPrestamo.php'">NUEVO PRÉSTAMO</button>
            <button class="btn btn-secondary" onclick="location.href='registrarUsuario.php'">USUARIOS</button>
            <button class="btn btn-primary" onclick="location.href='registrarLibro.php'">REGISTRAR LIBRO</button><br><br>
            <button class="btn btn-primary" onclick="location.href='generarReporte.php'">GENERAR REPORTE DE PRÉSTAMOS</button>
        </div>

        <div class="container-md p-2 text-center d-grid gap-2 d-md-block">
            <!-- Inicio seccion de filtros -->
            <caption><b>FILTROS DE BÚSQUEDA</b></caption>
            <div class="container-md p-2 text-center d-grid gap-2 d-md-block">
                <div class="container-md p-2 text-center d-grid gap-2 d-md-block">
                    <b>Filtrar por: </b>
                    
                    <input type="radio" name="fecha" id="fecha1" value="sinFiltro" checked>
                    <label for="fecha1" class="form-check-label">Sin filtro</label>
                    <input type="radio" name="fecha" id="fecha2" value="fechaPrestamo">
                    <label for="fecha2" class="form-check-label">Fecha de préstamo</label>
                    <input type="radio" name="fecha" id="fecha3" value="fechaDevolucion">
                    <label for="fecha3" class="form-check-label">Fecha de devolución</label>
                    <input type="radio" name="fecha" id="porUsuario" value="porUsuario">
                    <label for="porUsuario" class="form-check-label">Por usuario</label>
                    <input type="radio" name="fecha" id="porLibro" value="porLibro">
                    <label for="porLibro" class="form-check-label">Por libro</label><br>
                </div>
                <label for="fechaInicial" class="form-check-label">Fecha inicial: </label>
                <input type="date" name="fechaInicial" id="fechaInicial" value="2022-01-01">
                <label for="fechaFinal" class="form-check-label">Fecha final: </label>
                <input type="date" name="fechaFinal" id="fechaFinal" value="2022-12-31">
                
                <br><label for="estado" class="form-check-label">Estado: </label>
                <select name="estado" id="estado">
                    <option value="En Prestamo">En préstamo</option>
                    <option value="entregado">Entregado</option>
                    <option value="perdido">Perdido</option>
                </select>
                
                <label for="CBUsuario" class="form-check-label">Usuario: </label>
                <select name="CBUsuario" id="CBUsuario">
                    <option value="Ninguno">Ninguno</option>
                    <?php
                        $sql = "SELECT * FROM usuarios";
                        $query = mysqli_query($conexion, $sql);
                        while($nombre = mysqli_fetch_array($query)){
                            ?>
                        <option value="<?php echo $nombre['idusuarios']."-".$nombre['nombre']?>"><?php echo $nombre['idusuarios']."-".$nombre['nombre']?></option>
                    ?>
                    <?php
                    }
                    ?>
                </select>
                <label for="CBUsuario" class="form-check-label">Libro: </label>
                <select name="CBLibro" id="CBLibro">
                    <option value="Ninguno">Ninguno</option>
                    <?php
                        $sql = "SELECT * FROM libros";
                        $query = mysqli_query($conexion, $sql);
                        while($nombre = mysqli_fetch_array($query)){
                            ?>
                        <option value="<?php echo $nombre['idlibros']."-".$nombre['nombre']?>"><?php echo $nombre['idlibros']."-".$nombre['nombre']?></option>
                    ?>
                    <?php
                    }
                    ?>
                </select>

                <input type="button" id="bFiltrar" value="Filtrar" onclick="peticionGet()" class="btn btn-primary">
            </div>
            <!-- Fin seccion de filtros -->
            <!-- Inicio tabla -->
            <caption><b>REGISTRO DE PRÉSTAMOS</b></caption>
            <div id="divContenedor" class="container-md p-2 text-center d-grid gap-2 d-md-block">
                <table class="table table-info table-striped table-hover table-bordered">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Libro</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Fecha de préstamo</th>
                        <th scope="col">Fecha de devolución</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                    
                        <?php
                        $sql_prestamos = "SELECT * FROM prestamos";/*ORDER BY fechaPrestamo*/
                        $sql = "SELECT * FROM prestamos, usuarios, libros, autores";
                        $query_prestamos = mysqli_query($conexion, $sql_prestamos);
                        $query = mysqli_query($conexion, $sql);
                        while($row = mysqli_fetch_array($query_prestamos)){
                            $libro = mysqli_fetch_array(mysqli_query($conexion, "SELECT nombre FROM libros WHERE idlibros=".$row["libros_idlibros"].""));
                            $usuario = mysqli_fetch_array(mysqli_query($conexion, "SELECT nombre FROM usuarios WHERE idusuarios=".$row["usuarios_idusuarios"].""));
                            ?>
                        <tr>

                            <th scope="row"><?php echo $row['idprestamos']?></th>
                            <td><?php echo $libro['nombre']?></td>
                            <td><?php echo $usuario['nombre']?></td>
                            <td><?php echo $row['fechaPrestamo']?></td>
                            <td><?php echo $row['fechaRegreso']?></td>
                            <td><?php echo $row['estado']?></td>
                            <td><a href="editarPrestamo.php?id=<?php echo $row['idprestamos']?>" class="btn btn-primary">Editar</a></td>
                            <td><a href="elimPres.php?id=<?php echo $row['idprestamos']?>" class="btn btn-primary">Eliminar</a></td>
                        </tr>
                    
                    <?php
                        }
                        $conexion->close();
                    ?>
                </table>
                <!-- Fin tabla -->
            </div>
            
        </div>
    </section>
    <!-- Contenido -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    <!-- Footer -->
    <footer class="bg-dark text-center text-white">
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2022 Gabriel Colmenares Rangel
    </div>
    <!-- Copyright -->
    </footer>
    <!-- Footer -->
</body>
</html>