<?php
    $autor = $_POST['CBAutor'];
    $nombre = $_POST['txtNombre'];
    $estado = $_POST['CBEstado'];
    $editorial = $_POST['txtEditorial'];
    $tipo = $_POST['CBTipo'];
    $fechaImp = $_POST['dtImpresion'];
    $fechaAdq = $_POST['dtAdquisicion'];
    #Conexión a la DB
    $conexion = new mysqli("localhost","root","","prestamoLibros");
    if ($conexion->connect_error) {
        die("Connection failed: " . $conexion->connect_error);
    }
    #Insersión de datos
    $idautor = mysqli_fetch_array(mysqli_query($conexion, "SELECT idautores FROM autores WHERE nombre='".$autor."'"));
    $datosInsertar = "'".$idautor['idautores']."','".$nombre."','".$estado."','".$editorial."','".$tipo."','".$fechaImp."','".$fechaAdq."'";
    $sqlInstruccion = "INSERT INTO libros (autores_idautores,nombre,estado,editorial,tipo,fechaImpresion,fechaAdquisicion) VALUES (".$datosInsertar.")";
     if ($conexion->query($sqlInstruccion) === TRUE) {
      echo "<h2>SE REGISTRÓ DE MANERA EXITOSA</h2>";
    } else {
      echo "Error: " . $sqlInstruccion . "<br>" . $conexion->error;
    }
    header("Refresh:0; registrarLibro.php")
?>