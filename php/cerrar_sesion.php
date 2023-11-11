<?php
    session_start();
    if(!isset($_SESSION['usuario'])) return;

    session_unset();
    unset($_SESSION['usuario']);
    unset($_SESSION['rol']);
    header('Location: ../index.php');
?>