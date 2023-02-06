<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo.css">
    <title>Registrar libro</title>
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
    <section class="contenido">
        <div class="container p-2 text-center d-grid gap-2 d-md-block col-6">
            <h2>REGISTRO DE AUTORES</h2>
            <form action="regAut.php" method="post" class="mb-3" required>
                <div class="row mb-3">
                    <label for="txtNombre" class="form-label">Nombre</label>
                    <input type="text" name="txtNombre" id="txtNombre" class="form-control" required>
                </div>
                <div class="row mb-3">
                    <label for="txtLugar" class="form-label">Lugar de nacimiento</label>
                    <input type="text" name="txtLugar" id="txtLugar" class="form-control" required>
                </div>
                <div class="row mb-3">
                    <label for="dtFechaNac" class="form-label">Fecha de nacimiento</label>
                    <input type="date" name="dtFechaNac" id="dtFechaNac" class="form-control" required>
                </div>
                <div class="row mb-3">
                    <label for="txtBiografia" class="form-label">Link a biografía</label>
                    <input type="text" name="txtBiografia" id="txtBiografia" class="form-control" required>
                </div>
                <input type="submit" value="Registrar" class="btn btn-primary">
            </form>
        </div>
        <div class="container-md p-2 text-center d-grid gap-2 d-md-block">
            <caption><b>AUTORES REGISTRADOS</b></caption>
            <table class="table table-info table-striped table-hover table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Fecha de nacimiento</th>
                    <th>Lugar de nacimiento</th>
                    <th>Biografía</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
                <?php
                    $conexion = new mysqli("localhost","root","","prestamoLibros");

                    if ($conexion->connect_error) {
                        die("Connection failed: " . $conexion->connect_error);
                    }
                    $sql = "SELECT * FROM autores";
                    $query = mysqli_query($conexion, $sql);
                    while($row = mysqli_fetch_array($query)){
                        ?>
                    <tr>
                        <td><?php echo $row['idautores']?></td>
                        <td><?php echo $row['nombre']?></td>
                        <td><?php echo $row['fechaNacimiento']?></td>
                        <td><?php echo $row['lugarNacimiento']?></td>
                        <td class="text-break"><?php echo $row['linkBiografia']?></td>
                        <td><a href="editarAutor.php?id=<?php echo $row['idautores']?>" class="btn btn-primary">Editar</a></td>
                        <td><a href="elimAut.php?id=<?php echo $row['idautores']?>" class="btn btn-primary">Eliminar</a></td>
                    </tr>
                
                <?php
                    }
                    $conexion->close();
                ?>
            </table>
        </div>
    </section>
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