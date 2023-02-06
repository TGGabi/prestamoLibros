<?php
    $libro = explode("-",$_POST['CBLibro']);
    $usuario = explode("-",$_POST['usuario']);
    $fechaPrestamo = $_POST['dtPrestamo'];
    $fechaEntrega = $_POST['dtEntrega'];
    $estado = $_POST['CBEstado'];
    var_dump($libro[0]);
    #Conexión a la DB
    $conexion = new mysqli("localhost","root","","prestamoLibros");
    if ($conexion->connect_error) {
        die("Connection failed: " . $conexion->connect_error);
    }
    #Insersión de datos
    #$idautor = mysqli_fetch_array(mysqli_query($conexion, "SELECT idautores FROM autores WHERE nombre='".$autor."'"));
    $datosInsertar = "'".$libro[0]."','".$usuario[0]."','".$fechaPrestamo."','".$fechaEntrega."','".$estado."'";
    $sqlInstruccion = "INSERT INTO prestamos (libros_idlibros,usuarios_idusuarios,fechaPrestamo,fechaRegreso,estado) VALUES (".$datosInsertar.")";
     if ($conexion->query($sqlInstruccion) === TRUE) {
      echo "<h2>SE REGISTRÓ DE MANERA EXITOSA</h2>";
    } else {
      echo "Error: " . $sqlInstruccion . "<br>" . $conexion->error;
    }
    header("Refresh:0; index.php")
?>