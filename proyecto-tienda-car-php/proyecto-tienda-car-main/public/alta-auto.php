<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Publica tu auto en AutoCom: llena los datos y envía tu publicación.">
    <title>Vender mi auto | AutoCom</title>
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
                <li><a href="autos.html">Catálogo</a></li>
                <li><a href="alta-auto.html" aria-current="page">Vender mi auto</a></li>
                <li><a href="contacto.html">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <main id="contenido">
        <h1>Vender mi auto</h1>

        <div class="mensaje mensaje--ok" id="confirmacion" role="status" tabindex="-1" hidden>
            <p><strong>Recibimos los datos de tu auto.</strong></p>
            <p>La publicación en el catálogo se activará cuando el guardado esté listo en la siguiente unidad del proyecto.</p>
            <p class="mt-2"><a href="autos.html" class="boton">Ir al catálogo</a> <a href="alta-auto.html" class="boton boton--secundario">Publicar otro auto</a></p>
        </div>

        <form class="formulario" id="form-alta" action="alta-auto.html" method="post">
            <div class="campo">
                <label for="nombre">Marca y modelo</label>
                <input type="text" id="nombre" name="nombre" placeholder="Ej. Nissan Altima" required aria-describedby="ayudaNombre">
                <p class="ayuda-campo" id="ayudaNombre">Escribe la marca y el modelo del auto.</p>
                <p class="error-campo">Escribe la marca y el modelo.</p>
            </div>

            <div class="campo">
                <label for="anio">Año</label>
                <input type="number" id="anio" name="anio" min="1950" max="2027" placeholder="Ej. 2011" required aria-describedby="ayudaAnio">
                <p class="ayuda-campo" id="ayudaAnio">Año del auto, entre 1950 y 2027.</p>
                <p class="error-campo">Escribe un año entre 1950 y 2027.</p>
            </div>

            <div class="campo">
                <label for="categoria">Categoría</label>
                <select id="categoria" name="categoria" required>
                    <option value="">Elige una categoría</option>
                    <option>Sedán</option>
                    <option>Sedán cupé</option>
                    <option>Hatchback</option>
                    <option>SUV</option>
                    <option>Camioneta</option>
                    <option>Deportivo</option>
                    <option>Otro</option>
                </select>
            </div>

            <div class="campo">
                <label for="precio">Precio (MXN)</label>
                <input type="number" id="precio" name="precio" min="1" step="0.01" placeholder="Ej. 60000" required aria-describedby="ayudaPrecio">
                <p class="ayuda-campo" id="ayudaPrecio">Precio en pesos mexicanos, mayor a 0.</p>
                <p class="error-campo">Escribe un precio mayor a 0.</p>
            </div>

            <div class="campo">
                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion" rows="4" placeholder="Estado del auto, kilometraje, extras…" required aria-describedby="ayudaDescripcion"></textarea>
                <p class="ayuda-campo" id="ayudaDescripcion">Cuenta el estado, el kilometraje y los extras.</p>
                <p class="error-campo">Escribe una descripción del auto.</p>
            </div>

            <div class="acciones">
                <button type="submit" class="boton">Publicar auto</button>
                <a href="autos.html" class="boton boton--secundario">Cancelar</a>
            </div>
        </form>
    </main>
    <footer>
        <p>&copy; 2026 AutoCom. Todos los derechos reservados.</p>
    </footer>
   
</body>
</html>
