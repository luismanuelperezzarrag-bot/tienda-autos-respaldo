<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Contacta a AutoCom por teléfono o con el formulario.">
    <title>Contacto | AutoCom</title>
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
                <li><a href="alta-auto.html">Vender mi auto</a></li>
                <li><a href="contacto.html" aria-current="page">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <main id="contenido">
        <h1>Contáctanos</h1>
        <!-- Verifica que sean los 10 dígitos completos del número real. -->
        <p class="mb-2">Llámanos al <a href="tel:+52443331919">443331919</a> o déjanos un mensaje y te respondemos.</p>

        <div class="mensaje mensaje--ok" id="confirmacion" role="status" tabindex="-1" hidden>
            <p><strong>Gracias, recibimos tu mensaje.</strong></p>
            <p>Te responderemos al correo que nos indicaste.</p>
        </div>

        <form class="formulario" id="form-contacto" action="contacto.html" method="post">
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" autocomplete="name" required>
            </div>
            <div class="campo">
                <label for="correo">Correo electrónico</label>
                <input type="email" id="correo" name="correo" autocomplete="email" placeholder="nombre@correo.com" required>
            </div>
            <div class="campo">
                <label for="mensaje">Mensaje</label>
                <textarea id="mensaje" name="mensaje" rows="5" required></textarea>
            </div>
            <div class="acciones">
                <button type="submit" class="boton">Enviar mensaje</button>
            </div>
        </form>
    </main>
    <footer>
        <p>&copy; 2026 AutoCom. Todos los derechos reservados.</p>
    </footer>
  
</body>
</html>