<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo.css">
    <title>Registrar prestamo</title>
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
            <h2>REGISTRO DE NUEVO PRÉSTAMO</h2>
            <?php
                $conexion = new mysqli("localhost","root","","prestamoLibros");

                if ($conexion->connect_error) {
                    die("Connection failed: " . $conexion->connect_error);
                }
                $sql_usuarios = "SELECT * FROM usuarios";/*ORDER BY fechaPrestamo*/
                $sql_libros = "SELECT * FROM libros WHERE estado='Disponible'";
                $query_usuarios = mysqli_query($conexion, $sql_usuarios);
                $query_libros = mysqli_query($conexion, $sql_libros);
                #while($row = mysqli_fetch_array($query_usuarios)){
                #    echo $row['idusuarios'].$row['nombre'];
                    #$libro = mysqli_fetch_array(mysqli_query($conexion, "SELECT * FROM libros"));
                    #$usuario = mysqli_fetch_array(mysqli_query($conexion, "SELECT idusuarios,nombre FROM usuarios"));
                #    ?>
            <form action="regPres.php" method="post" class="mb-3" required>    
                <div class="mb-3">
                    <label for="CBLibro" class="form-label">Libro</label>
                    <select name="CBLibro" id="CBLibro" class="form-select">
                        <option value="Nuevo">Nuevo</option>
                        <?php
                            while($libro = mysqli_fetch_array($query_libros)){
                                #echo $row['idusuarios'].$row['nombre'];
                                #$libro = mysqli_fetch_array(mysqli_query($conexion, "SELECT * FROM libros"));
                                #$usuario = mysqli_fetch_array(mysqli_query($conexion, "SELECT idusuarios,nombre FROM usuarios"));
                                
                        ?>
                            <option value="<?php echo $libro['idlibros']."-".$libro['nombre'] ?>"><?php echo $libro['idlibros']."-".$libro['nombre'] ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="CBUsuario" class="form-label">Usuario</label>
                    <select name="CBUsuario" id="CBUsuario" class="form-select">
                        <option value="Nuevo">Nuevo</option>
                        <?php
                            while($usuario = mysqli_fetch_array($query_usuarios)){
                                #echo $row['idusuarios'].$row['nombre'];
                                #$libro = mysqli_fetch_array(mysqli_query($conexion, "SELECT * FROM libros"));
                                #$usuario = mysqli_fetch_array(mysqli_query($conexion, "SELECT idusuarios,nombre FROM usuarios"));
                                
                        ?>
                            <option value="<?php echo $usuario['idusuarios']."-".$usuario['nombre'] ?>"><?php echo $usuario['idusuarios']."-".$usuario['nombre'] ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="dtPrestamo" class="form-label">Fecha de prestamo</label>
                    <input type="date" name="dtPrestamo" id="dtPrestamo" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="dtEntrega" class="form-label">Fecha de entrega</label>
                    <input type="date" name="dtEntrega" id="dtEntrega" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="CBEstado" class="form-label">Estado</label>
                    <select name="CBEstado" id="CBEstado" class="form-select">
                        <option value="En Prestamo">En prestamo</option>
                        <option value="Entregado">Entregado</option>
                        <option value="Perdido">Perdido</option>
                    </select>
                </div>
                <input type="submit" value="Registrar" class="btn btn-primary">
            </form>
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