<?php
    $nombre = $_POST['txtNombre'];
    $lugarNac = $_POST['txtLugar'];
    $fechaNac = $_POST['dtFechaNac'];
    $biografia = $_POST['txtBiografia'];
    #Conexión a la DB
    $conexion = new mysqli("localhost","root","","prestamoLibros");
    if ($conexion->connect_error) {
        die("Connection failed: " . $conexion->connect_error);
    }
    #Insersión de datos
    $datosInsertar = "'".$nombre."','".$lugarNac."','".$fechaNac."','".$biografia."'";
    $sqlInstruccion = "INSERT INTO autores (nombre,lugarNacimiento,fechaNacimiento,linkBiografia) VALUES (".$datosInsertar.")";
     if ($conexion->query($sqlInstruccion) === TRUE) {
      echo "<h2>SE REGISTRÓ AL AUTOR DE MANERA EXITOSA</h2>";
    } else {
      echo "Error: " . $sqlInstruccion . "<br>" . $conexion->error;
    }
    #Regresar a registrarUsuario.php
    header("Refresh:0; registrarAutor.php")
?>