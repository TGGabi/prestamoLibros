<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo.css">
    <title>Editar Libro</title>
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
            <h2>EDITAR DATOS DEL USUARIO</h2>
            <?php

                $id = $_GET['id'];
                #echo "El usuario es:".$id;
                $conexion = new mysqli("localhost","root","","prestamoLibros");

                if ($conexion->connect_error) {
                    die("Connection failed: " . $conexion->connect_error);
                }
                $sql = "SELECT * FROM libros WHERE idlibros=".$id."";
                $consulta = mysqli_query($conexion, $sql);
                while($fila = mysqli_fetch_array($consulta)){
                    $autor = mysqli_fetch_array(mysqli_query($conexion, "SELECT nombre FROM autores WHERE idautores='".$fila['autores_idautores']."'"));
                ?>
                <form action="editLib.php" method="post" class="mb-3" required>
                    <div class="row mb-3">
                        <label for="txtId" class="form-label">ID del libro</label>
                        <input type="text" name="txtId" id="txtId" value="<?php echo $fila['idlibros'] ?>" readonly class="form-control" required>
                    </div>
                    <div class="row mb-3">
                        <label for="CBAutor" class="form-label">Autor</label>
                        <select name="CBAutor" id="CBAutor" class="form-select col">
                        <option value="<?php echo $autor['nombre'] ?>" selected="selected"><?php echo $autor['nombre'] ?></option>
                            <option value="SinAutor">Sin Autor</option>
                            <?php
                            $conexion = new mysqli("localhost","root","","prestamoLibros");

                            if ($conexion->connect_error) {
                                die("Connection failed: " . $conexion->connect_error);
                            }
                            $sql = "SELECT nombre FROM autores";
                            $query = mysqli_query($conexion, $sql);
                            while($row = mysqli_fetch_array($query)){
                                echo '<option value="'.$row['nombre'].'">'.$row['nombre'].'</option>';
                                }
                                $conexion->close();
                            ?>
                        </select>
                        <a href="index.php" class="btn btn-primary col col-lg-3 ms-1">Nuevo Autor</a>
                    </div>
                    <div class="row mb-3">
                        <label for="txtNombre" class="form-label">Nombre</label>
                        <input type="text" name="txtNombre" id="txtNombre" value="<?php echo $fila['nombre'] ?>" class="form-control" required>
                    </div>
                    <div class="row mb-3">
                        <label for="CBEstado" class="form-label">Estado</label>
                        <select name="CBEstado" id="CBEstado" class="form-select">
                            <option value="<?php echo $fila['estado'] ?>" selected="selected"><?php echo $fila['estado'] ?></option>
                            <option value="Disponible">Disponible</option>
                            <option value="EnPrestamo">En préstamo</option>
                            <option value="Perdido">Pérdido</option>
                        </select>
                    </div>
                    <div class="row mb-3">
                        <label for="txtEditorial" class="form-label">Editorial</label>
                        <input type="text" name="txtEditorial" id="txtEditorial" value="<?php echo $fila['editorial'] ?>" class="form-control" required>
                    </div>
                    <div class="row mb-3">
                        <label for="CBTipo" class="form-label">Tipo</label>
                        <select name="CBTipo" id="CBTipo" class="form-select">
                            <option value="SinDefinir">Sin definir</option>
                            <option value="<?php echo $fila['tipo'] ?>" selected="selected"><?php echo $fila['tipo'] ?></option>
                            <option value="Historia">Historia</option>
                            <option value="Ciencia">Ciencia</option>
                            <option value="Educacion">Educación</option>
                            <option value="Literatura">Literatura</option>
                            <option value="Infantil">Infantil</option>
                        </select>
                    </div>
                    <div class="row mb-3">
                        <label for="dtImpresion" class="form-label">Fecha de impresión</label>
                        <input type="date" name="dtImpresion" id="dtImpresion" value="<?php echo $fila['fechaImpresion'] ?>" class="form-control" required>
                    </div>
                    <div class="row mb-3">
                        <label for="dtAdquisicion" class="form-label">Fecha de adquisicion</label>
                        <input type="date" name="dtAdquisicion" id="dtAdquisicion" value="<?php echo $fila['fechaAdquisicion'] ?>" class="form-control" required>
                    </div>
                    <input type="submit" value="Registrar" class="btn btn-primary">
                </form>
                <?php
                }
    #                $conexion->close();
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