<?php
declare(strict_types=1);

require_once __DIR__ . '/../src/modelos/Categoria.php';
require_once __DIR__ . '/../src/modelos/Producto.php';

function e(string $texto): string {
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}

$sedan = new Categoria('Sedán');
$suv = new Categoria('SUV');

echo e($sedan->obtenerNombre()) . '<br>';
echo e($suv->obtenerNombre()) . '<br><br>';

// Un auto creado a mano con desdeArreglo()
$auto = Producto::desdeArreglo([
    'id' => 1,
    'nombre' => 'Chevy Pop 2010',
    'categoria' => 'Sedán cupé S',
    'precio' => 50000.00,
    'descripcion' => 'Vehículo en excelente estado.',
    'stock' => 1,
    'imagen' => 'assets/img/sin-foto.svg'
]);

echo e($auto->obtenerNombre()) . ' (' . e($auto->obtenerCategoria()->obtenerNombre())
    . ') cuesta ' . e($auto->obtenerPrecioFormateado()) . '<br>';
echo $auto->estaDisponible() ? 'Disponible' : 'Vendido';
echo '<br><br>';

// Todos los autos de datos/datos.json
$registros = json_decode(
    (string) file_get_contents(__DIR__ . '/../datos/datos.json'),
    true
);

foreach ($registros as $registro) {
    $p = Producto::desdeArreglo($registro);
    echo e($p->obtenerNombre()) . ' | ' . e($p->obtenerCategoria()->obtenerNombre())
        . ' | ' . e($p->obtenerPrecioFormateado())
        . ' | ' . ($p->estaDisponible() ? 'Disponible' : 'Vendido') . '<br>';
}
