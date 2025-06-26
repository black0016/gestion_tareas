<?php

session_start();

define('APP_PATH', __DIR__ . '/..');
define('PUBLIC_PATH', 'http://localhost/gestion_tareas/public');

// Ruta absoluta en disco para acceder a los archivos estáticos
define('PUBLIC_DIR', APP_PATH . '/public');

date_default_timezone_set('America/Bogota');

// Configuraciones de entorno de la aplicacion
require_once 'env.php';

// Rutas de la aplicación
require_once 'routes.php';
