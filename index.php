<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Seguro de autos</title>
</head>
<body>
    <header>
        <nav class="wrapper">
            <ul class="nav-header">
                <li><a href="index.php#inicio">Inicio</a></li>
                <?php 
                    session_start();
                    if(isset($_SESSION['rol'])) {
                        if($_SESSION['rol'] == 'admin') {
                            echo '<li><a href="vehiculos.php">Vehiculos</a></li>';
                        }
                    }
                ?>
                <li><a href="index.php#planes">Planes</a></li>
                <li><a href="index.php#contacto">Contacto</a></li>
            </ul>
            <div class="nav-body">
            <?php
                    if(isset($_SESSION['usuario'])) {
                        echo '<a href="perfil.php" style="margin-left: 20px">Perfil</a>';
                        echo '<a href="php/cerrar_sesion.php">Cerrar Sesion</a>';
                    } else {
                        echo '<a href="iniciar_sesion.php">Iniciar Sesion</a>';
                    }
                ?>
            </div>
        </nav>
    </header>
    <section id="inicio" class="inicio">
        <h1>Protege tu auto con nosotros</h1>
        <p>Ofrecemos las mejores opciones de seguro para tu vehículo.</p>
        <a class="boton-grande" href="#">Ingresar Vehiculo</a>
    </section>
    <div class="fondo">
        <main class="wrapper">
            <section id="planes" class="planes">
                <h2>Precios de planes</h2>
                <div class="container">
                    <article class="plan">
                        <h3>Plan Basico</h3>
                        <p>Cobertura básica para conductores responsables.</p>
                        <h3>$50/mes</h3>
                    </article>
                    <article class="plan">
                        <h3>Plan Premium </h3>
                        <p>Cobertura completa con beneficios adicionales.</p>
                        <h3>$80/mes</h3>
                    </article>
                </div>
            </section>
            <section class="beneficios">
                <h2>Beneficios del seguro</h2>
                <article>
                    <ul>
                        <li>Cobertura completa contra accidentes</li>
                        <li>Asistencia en carretera las 24 horas</li>
                        <li>Pagos flexibles</li>
                        <li>Seguro de auto de reemplazo</li>
                    </ul>
                </article>
            </section>
        </main>
    </div>
    <section id="ingresar-vehiculo" class="ingresar-vehiculo">
        <h2>Ingresa tu vehiculo</h2>
        <?php 
            if(!isset($_SESSION['usuario'])) {
                echo '<h2>Inicia sesion para añadir tu vehiculo.</h2>';
                echo '<a href="iniciar_sesion.php">Iniciar Sesion</a>';
                return;
            };
            include 'formulario.php';
        ?>       
    </section>
    <footer id="contacto">
        <div class="wrapper">
            <p>Contacto</p>
            <p>¡Contáctanos para obtener más información!</p>
            <p>Teléfono: 123-456-7890</p>
            <p>Correo Electrónico: info@segurodeautos.com</p>
        </div>
    </footer>
</body>
</html>