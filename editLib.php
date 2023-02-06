<?php
    $id = $_POST['txtId'];
    $autor = $_POST['CBAutor'];
    $nombre = $_POST['txtNombre'];
    $estado = $_POST['CBEstado'];
    $editorial = $_POST['txtEditorial'];
    $tipo = $_POST['CBTipo'];
    $fechaImp = $_POST['dtImpresion'];
    $fechaAdq = $_POST['dtAdquisicion']; 

    $conexion = new mysqli("localhost","root","","prestamoLibros");

    if ($conexion->connect_error) {
        die("Connection failed: " . $conexion->connect_error);
    }
    $idautor = mysqli_fetch_array(mysqli_query($conexion, "SELECT idautores FROM autores WHERE nombre='".$autor."'"));
    #echo $idautor['idautores'];
    $sql = "UPDATE libros SET 
    autores_idautores='".$idautor['idautores']."', 
    nombre='".$nombre."', 
    estado='".$estado."',
    editorial='".$editorial."',
    tipo='".$tipo."',
    fechaImpresion='".$fechaImp."',
    fechaAdquisicion='".$fechaAdq.
    "' WHERE idlibros='".$id."'";
    if (mysqli_query($conexion, $sql)){
        echo "<h2>Actualización completada con éxito</h2>";
    }else{
        echo "<h2>Error al actualizar</h2>";
    }
    $conexion->close();
    header("Refresh:0; registrarLibro.php");
?>