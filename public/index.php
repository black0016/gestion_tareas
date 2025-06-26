<?php

require_once '../config/app.php';
require_once APP_PATH . '/app/libraries/Route.php';

$url = $_GET['url'] ?? '';
$route = ROUTES[$url] ?? false;

// Solo exigir sesión si la ruta tiene perfiles definidos
if ($route && !empty($route['perfil'])) {
   if (!isset($_SESSION["usuario"]["idTipoUsuario"])) {
      // Si no hay sesión, redirige al login
      header('Location:' . PUBLIC_PATH . '/');
      exit();
   }
   // Validación genérica para cualquier tipo de usuario
   if (!in_array($_SESSION["usuario"]["idTipoUsuario"], $route["perfil"])) {
      header('HTTP/1.0 404 Not Found');
      die('Página no encontrada');
   }
}

if ($route) {
   $controller = $route['controller'];
   $action = $route['action'];

   Route::any($controller, $action);
} else {
   header('HTTP/1.0 404 Not Found');
   die('Página no encontrada');
}
