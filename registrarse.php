<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sesiones.css">
    <title>Registro</title>
</head>
<body>
    <main>
        <section class="formulario">
            <h2>Registro</h2>
            <form action="">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" placeholder="Pedro">
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" placeholder="Gomez">
                <label for="correo">Correo Electronico</label>
                <input type="text" name="correo" placeholder="ejemplo@gmail.com">
                <label for="correo">Contraseña</label>
                <input type="text" name="contra" placeholder="ejemplo123">
                <label for="telefono">Telefono</label>
                <input type="text" name="telefono" placeholder="1111-3333-4444">
                <button type="submit" class="boton">Acceder</button>
            </form>
            <div class="botones">
                <a href="index.html">Cerrar</a>
                <a href="iniciar_sesion.html">¿Ya tenes una cuenta?</a>
            </div>
        </section>
    </main>
    <?php
    $conexion = mysqli_connect("localhost", "root", "", "auto");
    if(!(isset($_POST['nombre']) or isset($_POST['apellido']) or isset($_POST['contra']) or isset($_POST['correo']) or isset($_POST['telefono']))) return;

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $contra = $_POST['contra'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
        
    $query = "SELECT * FROM clientes WHERE correo_electronico = '$correo'";
    $resultado = mysqli_query($conexion, $query);
    
    if(mysqli_num_rows($resultado) >= 1) {
        echo '<script type="text/javascript">alert("Ya existe una cuenta con este nombre de usuario.")</script>';
    } else {
        $query = "INSERT INTO clientes (nombre, apellido, telefono, correo_electronico, contraseña) VALUES ('$nombre', '$apellido', '$telefono', '$correo', '$contra')";
        mysqli_query($conexion, $query);
        
        echo '<script type="text/javascript">alert("Registrado correctamente, inicia sesion.")</script>';
        header("Location: iniciar_sesion.php");
    }

    ?>
</body>
</html>