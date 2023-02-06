<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo.css">
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
    <section class="contenido">
        <div class="container-md p-2 text-center d-grid gap-2 d-md-block">
            <h2>Préstamo de libros</h2>
            <button class="btn btn-success" onclick="location.href='registrarPrestamo.php'">NUEVO PRÉSTAMO</button>
            <button class="btn btn-secondary" onclick="location.href='registrarUsuario.php'">USUARIOS</button>
            <button class="btn btn-primary" onclick="location.href='registrarLibro.php'">REGISTRAR LIBRO</button>
        </div>

        <div class="container-md p-2 text-center d-grid gap-2 d-md-block">
            <caption><b>REGISTRO DE PRÉSTAMOS</b></caption>
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
                    $conexion = new mysqli("localhost","root","","prestamoLibros");

                    if ($conexion->connect_error) {
                        die("Connection failed: " . $conexion->connect_error);
                    }
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