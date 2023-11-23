<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sesiones.css">
    <title>Iniciar Sesion</title>
</head>
<body>
    <main>
        <section class="formulario">
            <h2>Iniciar Sesion</h2>
            <form method="post">
                <label for="correo">Correo Electronico</label>
                <input type="text" name="correo" placeholder="ejemplo@gmail.com">
                <label for="correo">Contraseña</label>
                <input type="text" name="contra" placeholder="ejemplo123">
                <button type="submit" class="boton">Acceder</button>
            </form>
            <div class="botones">
                <a href="index.php">Cerrar</a>
                <a href="registrarse.php">¿No tenes una cuenta?</a>
            </div>
        </section>
    </main>
    <?php
    session_start();
    $conexion = mysqli_connect("localhost", "root", "", "auto");
    if(!(isset($_POST['correo']) or isset($_POST['contra']))) return;

    $correo = $_POST['correo'];
    $contra = $_POST['contra'];
        
    $query = "SELECT * FROM clientes WHERE correo_electronico = '$correo' AND contraseña = '$contra'";
    $resultado = mysqli_query($conexion, $query);
    
    if(mysqli_num_rows($resultado) == 1) {
        $fila = mysqli_fetch_row($resultado);

        if(isset($_SESSION['usuario'])) {
            unset($_SESSION['usuario']);
        }
        
        $_SESSION['usuario'] = $fila[0];
        $_SESSION['rol'] = $fila[6];

        header("Location: index.php");
    } else {
        echo '<script type="text/javascript">alert("No se encontro tu cuenta.")</script>';
    }
    
    
    ?>
</body>
</html>