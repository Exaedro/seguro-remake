<?php
    if(!isset($_SESSION['usuario'])) return header('Location: ../iniciar_sesion.php');
    
    $db = mysqli_connect('localhost', 'phpmyadmin', 'phpmyadmin', 'auto');
    
    $query = "SELECT c.nombre, c.apellido, c.correo_electronico, c.telefono, COUNT(v.IDvehiculo) as cantidad FROM clientes c JOIN vehiculos v ON c.DNI_cliente = v.DNI_cliente WHERE c.DNI_cliente = ". $_SESSION['usuario'] .";";
    $result = mysqli_query($db, $query);

    while($fila = mysqli_fetch_assoc($result)) {
        $nombre = $fila['nombre'];
        $apellido = $fila['apellido'];
        $correo = $fila['correo_electronico'];
        $telefono = $fila['telefono'];
        $coches = $fila['cantidad'];

        echo "<h1>$nombre $apellido</h1>";
        echo "<p>Correo: $correo</p>";
        echo "<p>Telefono: $telefono</p>";
        echo "<p>Coches: $coches</p>";
    }
?>