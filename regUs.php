<?php
    $nombre = $_POST['txtNombre'];
    $curp = $_POST['txtCurp'];
    $tipo = $_POST['CBTipo'];
    #Conexión a la DB
    $conexion = new mysqli("localhost","root","","prestamoLibros");
    if ($conexion->connect_error) {
        die("Connection failed: " . $conexion->connect_error);
    }
    #Insersión de datos
    $datosInsertar = "'".$nombre."','".$curp."','".$tipo."'";
    $sqlInstruccion = "INSERT INTO usuarios (nombre,curp,tipoUsuario) VALUES (".$datosInsertar.")";
     if ($conexion->query($sqlInstruccion) === TRUE) {
      echo "<h2>SE REGISTRÓ DE MANERA EXITOSA</h2>";
    } else {
      echo "Error: " . $sqlInstruccion . "<br>" . $conexion->error;
    }
    #Regresar a registrarUsuario.php
    header("Refresh:0; registrarUsuario.php")
?>