<?php
declare(strict_types=1);

require_once __DIR__ . '/../src/datos/RepositorioAutos.php';
require_once __DIR__ . '/../src/utilidades/vistas.php';

$repositorio = new RepositorioAutos(__DIR__ . '/../datos/datos.json');
$categorias = $repositorio->obtenerCategorias();

$categoriaSeleccionada = trim((string) ($_GET['categoria'] ?? ''));
$errorCategoria = '';
$autos = [];

try {
    if ($categoriaSeleccionada === '') {
        $autos = $repositorio->obtenerTodos();
    } else {
        $autos = $repositorio->obtenerPorCategoria($categoriaSeleccionada);
    }
} catch (OutOfBoundsException $error) {
    $errorCategoria = $error->getMessage();
    http_response_code(404);
}
$totalAutos = count($autos);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Catálogo de autos seminuevos con precio y detalle de cada unidad.">
    <title>Catálogo de autos | AutoCom</title>
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
        <h1>Catálogo de autos</h1>
        <p class="texto-suave mb-2"><?= $totalAutos ?> autos disponibles</p>

        <nav aria-label="Filtrar por categoría" style="margin-bottom: 16px;">
            <a class="etiqueta" href="autos.php">Todas</a>
            <?php foreach ($categorias as $categoria): ?>
                <?php $nombreCat = $categoria->obtenerNombre(); ?>
                <a class="etiqueta" href="autos.php?categoria=<?= urlencode($nombreCat) ?>">
                    <?= escapar($nombreCat) ?>
                </a>
            <?php endforeach; ?>
        </nav>

        <?php if ($errorCategoria !== ''): ?>
            <div class="mensaje mensaje--error">
                <p><strong><?= escapar($errorCategoria) ?></strong></p>
            </div>
            <a class="boton mt-2" href="autos.php">Ver todo el catálogo</a>
        <?php elseif (empty($autos)): ?>
            <p>No hay autos registrados en esta categoría.</p>
        <?php else: ?>
            <section class="listado" aria-label="Lista de autos">
                <?php foreach ($autos as $auto): ?>
                    <?php mostrarTarjetaAuto($auto, 2); ?>
                <?php endforeach; ?>
            </section>
        <?php endif; ?>
    </main>
    <footer>
        <p>&copy; 2026 AutoCom. Todos los derechos reservados.</p>
    </footer>
</body>
</html>