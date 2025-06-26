<?php

class HelperService
{
    /**
     * Genera una cadena de texto que representa una lista de valores separados por comas,
     * encerrados entre paréntesis, a partir de un array dado.
     *
     * @param array $datos Un array de valores que se desea convertir en una lista.
     *                      Cada valor del array será concatenado en la cadena resultante.
     * 
     * @return string|false Devuelve una cadena con el formato "(valor1,valor2,valor3,...)"
     *                      si el array no está vacío. Si el array está vacío, devuelve false.
     *
     * Ejemplo de uso:
     * $datos = [1, 2, 3];
     * $resultado = HelperService::obtenerIn($datos);
     * // Resultado: "(1,2,3)"
     */
    public static function obtenerIn(array $datos)
    {
        if (empty($datos)) {
            return false;
        }
        $ids = "(";
        foreach ($datos as $value) {
            $ids .= $value . ",";
        }
        $ids = trim($ids, ",");
        $ids .= ")";
        return $ids;
    }

    /**
     * Genera una URL con una versión basada en la fecha de modificación del archivo.
     *
     * @param string $ruta La ruta relativa del archivo dentro del directorio público.
     *                      Debe comenzar sin una barra inicial.
     * 
     * @return string Devuelve la URL del archivo con un parámetro de versión (?v=timestamp).
     *                Si el archivo no existe, se utiliza la marca de tiempo actual.
     *
     * Ejemplo de uso:
     * $urlVersionada = HelperService::autoVersion('css/estilos.css');
     * // Resultado: '/public/css/estilos.css?v=1672531199'
     */
    public static function autoVersion(string $ruta)
    {
        $rutaCompleta = PUBLIC_DIR . '/' . ltrim($ruta, '/');

        if (file_exists($rutaCompleta)) {
            $version = filemtime($rutaCompleta);
        } else {
            $version = time();
        }

        return PUBLIC_PATH . '/' . ltrim($ruta, '/') . '?v=' . $version;
    }
}
