<?php

$fecha = $_GET['fecha'];
$fechaInicio = $_GET['fechaInicio'];
$fechaDevolucion = $_GET['fechaDevolucion'];
$estado = $_GET['estado'];
$usuario = explode("-",$_GET['usuario']);
$libro = explode("-",$_GET['libro']);

?>

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

        switch ($fecha) {
            case 'fechaPrestamo':
                $sql_prestamos = "SELECT * FROM prestamos WHERE estado='".$estado."' AND fechaPrestamo BETWEEN '".$fechaInicio."' AND '".$fechaDevolucion."' ";/*ORDER BY fechaPrestamo*/
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
                
                break;
            case 'fechaDevolucion':
                $sql_prestamos = "SELECT * FROM prestamos WHERE estado='".$estado."' AND fechaRegreso BETWEEN '".$fechaInicio."' AND '".$fechaDevolucion."' ";/*ORDER BY fechaPrestamo*/
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
                break;
                case 'sinFiltro':
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
                    break;
            case 'porUsuario':
                $sql_prestamos = "SELECT * FROM prestamos WHERE usuarios_idusuarios='".$usuario[0]."'";/*ORDER BY fechaPrestamo*/
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
                break;
            case 'porLibro':
                $sql_prestamos = "SELECT * FROM prestamos WHERE libros_idlibros='".$libro[0]."'";/*ORDER BY fechaPrestamo*/
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
                break;
            default:
                
                break;
        }
    ?>
</table>