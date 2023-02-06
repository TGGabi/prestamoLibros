<?php
    $id = $_POST['txtId'];
    #$libro = $_POST['txtLibro'];
    #$usuario = $_POST['txtUsuario'];
    #$fechaPrestamo = $_POST['dtPrestamo'];
    $fechaEntrega = $_POST['dtEntrega'];
    $estado = $_POST['CBEstado'];

    $conexion = new mysqli("localhost","root","","prestamoLibros");

    if ($conexion->connect_error) {
        die("Connection failed: " . $conexion->connect_error);
    }
    $sql = "UPDATE prestamos SET fechaRegreso='".$fechaEntrega."', estado='".$estado."' WHERE idprestamos='".$id."'";
    if (mysqli_query($conexion, $sql)){
        echo "<h2>Actualización de PRESTAMO completada con éxito</h2>";
    }else{
        echo "<h2>Error al actualizar</h2>";
    }
    $conexion->close();
    header("Refresh:0; index.php");
?>