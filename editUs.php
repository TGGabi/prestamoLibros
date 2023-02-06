<?php
    $id = $_POST['txtId'];
    $nombre = $_POST['txtNombre'];
    $curp = $_POST['txtCurp'];
    $tipo = $_POST['CB'];  

    $conexion = new mysqli("localhost","root","","prestamoLibros");

    if ($conexion->connect_error) {
        die("Connection failed: " . $conexion->connect_error);
    }
    $sql = "UPDATE usuarios SET nombre='".$nombre."', curp='".$curp."', tipoUsuario='".$tipo."' WHERE idusuarios='".$id."'";
    if (mysqli_query($conexion, $sql)){
        echo "<h2>Actualización completada con éxito</h2>";
    }else{
        echo "<h2>Error al actualizar</h2>";
    }
    $conexion->close();
    header("Refresh:0; registrarUsuario.php");
?>