<?php
declare(strict_types=1);

require_once __DIR__ . '/../modelos/Auto.php';

function escapar(string $texto): string {
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}

function mostrarTarjetaAuto(Auto $auto, int $nivelTitulo = 3): void {
    $titulo = 'h' . $nivelTitulo;
    $nombre = escapar($auto->obtenerNombre());
    $categoria = escapar($auto->obtenerCategoria()->obtenerNombre());
    ?>
    <article class="tarjeta">
        <img class="tarjeta__imagen" src="<?= escapar($auto->obtenerImagen()) ?>" alt="Foto de <?= $nombre ?>" width="400" height="300" loading="lazy">
        <<?= $titulo ?> class="tarjeta__nombre"><?= $nombre ?></<?= $titulo ?>>
        <p class="tarjeta__detalle">Categoría: <?= $categoria ?></p>
        <p class="tarjeta__precio"><?= $auto->obtenerPrecioFormateado() ?></p>
        <p class="tarjeta__estado">
            <?php mostrarDisponibilidad($auto); ?>
        </p>
        <a href="auto-detalle.php?id=<?= $auto->obtenerId() ?>" class="boton" aria-label="Ver detalle de <?= $nombre ?>">Ver detalle</a>
    </article>
    <?php
}

function mostrarDisponibilidad(Auto $auto): void {
    if ($auto->estaDisponible()) {
        echo '<span class="etiqueta etiqueta--disponible">Disponible</span>';
        return;
    }
    echo '<span class="etiqueta etiqueta--agotado">Agotado</span>';
}