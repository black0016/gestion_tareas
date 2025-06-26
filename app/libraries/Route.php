<?php

// Autoload para controladores y modelos
spl_autoload_register(function ($class) {
    $paths = [
        APP_PATH . '/app/controllers/' . $class . '.php',
        APP_PATH . '/app/models/' . $class . '.php',
        APP_PATH . '/app/services/' . $class . '.php',
        APP_PATH . '/app/libraries/' . $class . '.php',
    ];
    foreach ($paths as $file) {
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Requiere archivos especiales si los necesitas
// Ejemplo de como llamar un archivo sin clase para que se cargue dentro del proyecto
# require_once APP_PATH . '/app/libraries/View.php';

class Route
{
    public static function any($controller = null, $action = 'index')
    {
        if (!$controller) {
            header('HTTP/1.0 404 Not Found');
            die('Página no encontrada');
        }

        $controllerClass = "{$controller}Controller";
        if (!class_exists($controllerClass)) {
            header('HTTP/1.0 404 Not Found');
            die('Controlador no encontrado');
        }

        $controllerInstance = new $controllerClass;

        if (!method_exists($controllerInstance, $action)) {
            header('HTTP/1.0 404 Not Found');
            die('Acción no encontrada');
        }

        return $controllerInstance->$action();
    }
}
