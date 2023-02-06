<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo.css">
    <title>Editar Prestamo</title>
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
            <h2>EDITAR DATOS DEL PRESTAMO</h2>
            <?php

                $id = $_GET['id'];
                #echo "El usuario es:".$id;
                $conexion = new mysqli("localhost","root","","prestamoLibros");

                if ($conexion->connect_error) {
                    die("Connection failed: " . $conexion->connect_error);
                }
                $sql = "SELECT * FROM prestamos WHERE idprestamos=".$id."";
                $consulta = mysqli_query($conexion, $sql);
                while($row = mysqli_fetch_array($consulta)){
                    $libro = mysqli_fetch_array(mysqli_query($conexion, "SELECT nombre FROM libros WHERE idlibros='".$row['libros_idlibros']."'"));
                    $usuario = mysqli_fetch_array(mysqli_query($conexion, "SELECT nombre FROM usuarios WHERE idusuarios='".$row['usuarios_idusuarios']."'"));
                ?>
                    <form action="editPres.php" method="post" class="mb-3" required>
                    <div class="mb-3">
                        <label for="txtId" class="form-label">ID</label>    
                        <input type="number" name="txtId" id="txtId" readonly value="<?php echo $row['idprestamos'] ?>" class="form-control" required>
                    </div>    
                    <div class="mb-3">
                        <label for="txtLibro" class="form-label">Libro</label>
                        <input type="text" name="txtLibro" id="txtLibro" readonly value="<?php echo $libro['nombre'] ?>" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="txtUsuario" class="form-label">Usuario</label>
                        <input type="text" name="txtUsuario" id="txtUsuario" readonly value="<?php echo $usuario['nombre'] ?>" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="dtPrestamo" class="form-label">Fecha de prestamo</label>
                        <input type="date" name="dtPrestamo" id="dtPrestamo" readonly value="<?php echo $row['fechaPrestamo'] ?>" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="dtEntrega" class="form-label">Fecha de entrega</label>
                        <input type="date" name="dtEntrega" id="dtEntrega" value="<?php echo $row['fechaRegreso'] ?>" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="CBEstado" class="form-label">Estado del préstamo</label>
                        <select name="CBEstado" id="CBEstado" class="form-select">
                            <option value="<?php echo $row['estado'] ?>" selected="selected"><?php echo $row['estado'] ?></option>
                            <option value="En Prestamo">En prestamo</option>
                            <option value="Entregado">Entregado</option>
                            <option value="Perdido">Perdido</option>
                        </select>
                    </div>
                    
                    <input type="submit" value="Registrar" class="btn btn-primary">
                    </form>
                <?php
                }
                $conexion->close();
            ?>
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