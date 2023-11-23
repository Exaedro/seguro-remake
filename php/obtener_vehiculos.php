<?php
    if(!isset($_SESSION['usuario'])) {
        header('Location: ../iniciar_sesion.php');
        exit();
    }
    
    $db = mysqli_connect('localhost', 'root', '', 'auto');
    
    $query = "SELECT v.tipo_vehiculo, v.modelo, v.marca, c.apellido FROM vehiculos v JOIN clientes c ON v.DNI_cliente = c.DNI_cliente WHERE v.DNI_cliente = ". $_SESSION['usuario'] .";";
    $result = mysqli_query($db, $query);

    while($fila = mysqli_fetch_assoc($result)) {
        $tipoVehiculo = $fila['tipo_vehiculo'];
        $modelo = $fila['modelo'];
        $marca = $fila['marca'];
        $cliente = $fila['apellido'];

        echo "<article class='auto'>";
        echo "<h3>Tipo de Vehiculo</h3>";
        echo "<p>$tipoVehiculo</p>";
        echo "<h3>Marca</h3>";
        echo "<p>$marca</p>";
        echo "<h3>Modelo</h3>";
        echo "<p>$modelo</p>";
        echo "<h3>Cliente</h3>";
        echo "<p>$cliente</p>";
        echo "</article>";
    }
?>