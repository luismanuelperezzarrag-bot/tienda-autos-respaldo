<?php
declare(strict_types=1);

require_once __DIR__ . '/../src/datos/RepositorioAutos.php';
require_once __DIR__ . '/../src/utilidades/vistas.php';

$repositorio = new RepositorioAutos(__DIR__ . '/../datos/datos.json');
$destacados = array_slice($repositorio->obtenerTodos(), 0, 3);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Encuentra autos seminuevos al mejor precio en AutoCom.">
    <title>Inicio | AutoCom</title>
    <link rel="icon" href="assets/img/sin-foto.svg" type="image/svg+xml">
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>
    <a class="saltar" href="#contenido">Saltar al contenido</a>
    <header>
        <a class="logo" href="index.php">AutoCom</a>
        <nav aria-label="Principal">
            <ul>
                <li><a href="index.php" aria-current="page">Inicio</a></li>
                <li><a href="autos.php">Catálogo</a></li>
                <li><a href="alta-auto.php">Vender mi auto</a></li>
                <li><a href="contacto.php">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <main id="contenido">
        <section class="hero">
            <h1>Encuentra tu próximo auto al mejor precio</h1>
            <p>Revisa nuestro catálogo, consulta el detalle de cada auto y contáctanos para verlo.</p>
            <a href="autos.php" class="boton">Ver catálogo</a>
        </section>

        <section aria-labelledby="destacados">
            <h2 id="destacados">Autos destacados</h2>
            <div class="listado">
                <?php foreach ($destacados as $auto): ?>
                    <?php mostrarTarjetaAuto($auto, 3); ?>
                <?php endforeach; ?>
            </div>
            <p class="mt-2"><a href="autos.php">Ver todos los autos del catálogo</a></p>
        </section>
    </main>
    <footer>
        <p>&copy; 2026 AutoCom. Todos los derechos reservados.</p>
    </footer>
</body>
</html>