<?php
    $id = $_POST['txtId'];
    $nombre = $_POST['txtNombre'];
    $lugarNac = $_POST['txtLugar'];
    $fechaNac = $_POST['dtFechaNac'];
    $biografia = $_POST['txtBiografia']; 

    $conexion = new mysqli("localhost","root","","prestamoLibros");

    if ($conexion->connect_error) {
        die("Connection failed: " . $conexion->connect_error);
    }
    $sql = "UPDATE autores SET nombre='".$nombre."', lugarNacimiento='".$lugarNac."', fechaNacimiento='".$fechaNac."', linkBiografia='".$biografia."' WHERE idautores='".$id."'";
    if (mysqli_query($conexion, $sql)){
        echo "<h2>Actualización de AUTOR completada con éxito</h2>";
    }else{
        echo "<h2>Error al actualizar</h2>";
    }
    $conexion->close();
    header("Refresh:0; registrarAutor.php");
?>