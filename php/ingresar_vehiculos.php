<?php
    if(!$_SERVER['REQUEST_METHOD'] == 'POST') return;

    session_start();
    if(!isset($_SESSION['usuario'])) return header('Location: ../iniciar_sesion.php');

    $usuarioId = $_SESSION['usuario'];
    $tipoVehiculo = $_POST['tipo_vehiculo'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];

    $db = mysqli_connect('localhost', 'root', '', 'auto');
    $query = "INSERT INTO vehiculos (tipo_vehiculo, marca, modelo, DNI_cliente) VALUES ('$tipoVehiculo', '$marca', '$modelo', '$usuarioId');";
    mysqli_query($db, $query);

    header('Location: ../perfil.php');
    
?>