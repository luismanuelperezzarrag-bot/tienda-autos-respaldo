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
        <a class="logo" href="index.html">AutoCom</a>
        <nav aria-label="Principal">
            <ul>
                <li><a href="index.html">Inicio</a></li>
                <li><a href="autos.html" aria-current="page">Catálogo</a></li>
                <li><a href="alta-auto.html">Vender mi auto</a></li>
                <li><a href="contacto.html">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <main id="contenido">
        <h1>Catálogo de autos</h1>
        <p class="texto-suave mb-2">3 autos disponibles</p>

        <section class="listado" aria-label="Lista de autos">
                <article class="tarjeta">
                    <img class="tarjeta__imagen" src="assets/img/sin-foto.svg" alt="Foto próximamente de Chevy Pop 2010" width="400" height="300" loading="lazy">
                    <h2 class="tarjeta__nombre">Chevy Pop 2010</h2>
                    <p class="tarjeta__detalle">Categoría: Sedán cupé S</p>
                    <p class="tarjeta__precio">$50,000 MXN</p>
                    <p class="tarjeta__estado"><span class="etiqueta etiqueta--disponible">Disponible</span></p>
                    <a href="auto-detalle.html" class="boton" aria-label="Ver detalle de Chevy Pop 2010">Ver detalle</a>
                </article>
                <article class="tarjeta">
                    <img class="tarjeta__imagen" src="assets/img/sin-foto.svg" alt="Foto próximamente de Nissan Altima 2011" width="400" height="300" loading="lazy">
                    <h2 class="tarjeta__nombre">Nissan Altima 2011</h2>
                    <p class="tarjeta__detalle">Categoría: Sedán</p>
                    <p class="tarjeta__precio">$60,000 MXN</p>
                    <p class="tarjeta__estado"><span class="etiqueta etiqueta--disponible">Disponible</span></p>
                    <a href="auto-detalle-altima.html" class="boton" aria-label="Ver detalle de Nissan Altima 2011">Ver detalle</a>
                </article>
                <article class="tarjeta">
                    <img class="tarjeta__imagen" src="assets/img/sin-foto.svg" alt="Foto próximamente de Chrysler Spirit 1998" width="400" height="300" loading="lazy">
                    <h2 class="tarjeta__nombre">Chrysler Spirit 1998</h2>
                    <p class="tarjeta__detalle">Categoría: Sedán S</p>
                    <p class="tarjeta__precio">$80,000 MXN</p>
                    <p class="tarjeta__estado"><span class="etiqueta etiqueta--disponible">Disponible</span></p>
                    <a href="auto-detalle-spirit.html" class="boton" aria-label="Ver detalle de Chrysler Spirit 1998">Ver detalle</a>
                </article>
        </section>
    </main>
    <footer>
        <p>&copy; 2026 AutoCom. Todos los derechos reservados.</p>
    </footer>
</body>
</html>