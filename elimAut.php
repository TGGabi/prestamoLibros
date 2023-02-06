<?php
    $id = $_GET['id'];

    $conexion = new mysqli("localhost","root","","prestamoLibros");

    if ($conexion->connect_error) {
        die("Connection failed: " . $conexion->connect_error);
    }
    $sql = "DELETE FROM autores WHERE idautores=".$id."";
    if (mysqli_query($conexion, $sql)){
        echo "<h2>Eliminación del PRESTAMO completada con éxito</h2>";
    }else{
        echo "<h2>Error al eliminar</h2>";
    }
    $conexion->close();
    header("Refresh:0; registrarAutor.php");
?>