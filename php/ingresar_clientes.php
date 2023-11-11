<?php
    if(!$_SERVER['REQUEST_METHOD'] == 'POST') return;
        
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $correo_electronico = $_POST['correo_electronico'];
    $contraseña = $_POST['contraseña'];

    $db = mysqli_connect('localhost', 'phpmyadmin', 'phpmyadmin', 'auto');
    $query = "INSERT INTO clientes (nombre, apellido, telefono, correo_electronico, contraseña) VALUES ('$nombre', '$apellido', '$telefono', '$correo_electronico', '$contraseña');";
    mysqli_query($db, $query);
?>