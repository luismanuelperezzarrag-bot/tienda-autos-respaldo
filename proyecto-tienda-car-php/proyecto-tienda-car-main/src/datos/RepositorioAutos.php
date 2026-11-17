<?php
declare(strict_types=1);

require_once __DIR__ . '/../modelos/Auto.php';

class RepositorioAutos {
    private string $rutaArchivo;

    public function __construct(string $rutaArchivo) {
        $this->rutaArchivo = $rutaArchivo;
    }

    /** @return Auto[] */
    public function obtenerTodos(): array {
        return $this->convertirAAutos($this->leerRegistros());
    }

    public function buscarPorId(int $id): Auto {
        foreach ($this->obtenerTodos() as $auto) {
            if ($auto->obtenerId() === $id) {
                return $auto;
            }
        }

        throw new OutOfBoundsException("No existe un auto con id $id.");
    }

    /** @return Categoria[] */
    public function obtenerCategorias(): array {
        $categoriasUnicas = [];

        foreach ($this->obtenerTodos() as $auto) {
            $categoria = $auto->obtenerCategoria();
            $categoriasUnicas[$categoria->obtenerNombre()] = $categoria;
        }

        return array_values($categoriasUnicas);
    }

    /** @return Auto[] */
    public function obtenerPorCategoria(string $nombreCategoria): array {
        $existe = false;
        foreach ($this->obtenerCategorias() as $categoria) {
            if ($categoria->obtenerNombre() === $nombreCategoria) {
                $existe = true;
                break;
            }
        }

        if (!$existe) {
            throw new OutOfBoundsException("La categoría '$nombreCategoria' no existe.");
        }

        $filtrados = array_filter(
            $this->obtenerTodos(),
            fn(Auto $auto) => $auto->obtenerCategoria()->obtenerNombre() === $nombreCategoria
        );

        return array_values($filtrados);
    }

    private function leerRegistros(): array {
        if (!is_file($this->rutaArchivo)) {
            throw new RuntimeException("No se encontró el archivo de datos: {$this->rutaArchivo}");
        }

        $contenido = file_get_contents($this->rutaArchivo);
        $registros = json_decode($contenido, true, 512, JSON_THROW_ON_ERROR);

        if (!is_array($registros)) {
            throw new RuntimeException('El archivo de datos debe contener un arreglo de registros.');
        }

        return $registros;
    }

    /** @return Auto[] */
    private function convertirAAutos(array $registros): array {
        return array_map(
            fn(array $registro) => Auto::desdeArreglo($registro),
            $registros
        );
    }
}