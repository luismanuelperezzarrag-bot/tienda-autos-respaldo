<?php
declare(strict_types=1);

require_once __DIR__ . '/../src/datos/RepositorioAutos.php';
require_once __DIR__ . '/../src/utilidades/vistas.php';

$repositorio = new RepositorioAutos(__DIR__ . '/../datos/datos.json');

$idSolicitado = (int) filter_var($_GET['id'] ?? '', FILTER_VALIDATE_INT);
$autoEncontrado = true;

try {
    $auto = $repositorio->buscarPorId($idSolicitado);
} catch (OutOfBoundsException $error) {
    $autoEncontrado = false;
    http_response_code(404);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Detalle de auto: precio, categoría y disponibilidad en AutoCom.">
    <title><?= $autoEncontrado ? escapar($auto->obtenerNombre()) : 'Auto no encontrado' ?> | AutoCom</title>
    <link rel="icon" href="assets/img/sin-foto.svg" type="image/svg+xml">
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>
    <a class="saltar" href="#contenido">Saltar al contenido</a>
    <header>
        <a class="logo" href="index.php">AutoCom</a>
        <nav aria-label="Principal">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="autos.php" aria-current="page">Catálogo</a></li>
                <li><a href="alta-auto.php">Vender mi auto</a></li>
                <li><a href="contacto.php">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <main id="contenido">
        <nav class="migas" aria-label="Ruta de navegación">
            <a href="index.php">Inicio</a> / <a href="autos.php">Catálogo</a> / <span aria-current="page"><?= $autoEncontrado ? escapar($auto->obtenerNombre()) : 'No encontrado' ?></span>
        </nav>

        <?php if ($autoEncontrado): ?>
            <section class="ficha">
                <img class="ficha__imagen" src="<?= escapar($auto->obtenerImagen()) ?>" alt="Foto de <?= escapar($auto->obtenerNombre()) ?>" width="400" height="300">
                <div>
                    <h1 class="ficha__titulo"><?= escapar($auto->obtenerNombre()) ?></h1>
                    <p class="ficha__precio"><?= $auto->obtenerPrecioFormateado() ?></p>
                    <p class="ficha__descripcion"><?= escapar($auto->obtenerDescripcion()) ?></p>
                    <ul class="ficha__datos">
                        <li><strong>Categoría:</strong> <?= escapar($auto->obtenerCategoria()->obtenerNombre()) ?></li>
                        <li><strong>Disponibilidad:</strong> <?php mostrarDisponibilidad($auto); ?></li>
                    </ul>
                    <div class="acciones">
                        <a href="contacto.php" class="boton">Me interesa este auto</a>
                        <a href="autos.php" class="boton boton--secundario">Volver al catálogo</a>
                    </div>
                </div>
            </section>
        <?php else: ?>
            <section class="mensaje mensaje--error">
                <h2>Auto no encontrado</h2>
                <p>El vehículo que buscas no existe o ya no está disponible en nuestro inventario.</p>
                <div class="acciones mt-2">
                    <a href="autos.php" class="boton">Volver al catálogo</a>
                </div>
            </section>
        <?php endif; ?>
    </main>
    <footer>
        <p>&copy; 2026 AutoCom. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
