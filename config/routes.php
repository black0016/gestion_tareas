<?php

define('ROUTES', [
    ''                                                               => ['controller' => 'Login', 'action' => 'index', 'perfil' => []],
    'registrarUsuario'                                               => ['controller' => 'Login', 'action' => 'registrarUsuario', 'perfil' => []],
    'login'                                                          => ['controller' => 'Login', 'action' => 'login', 'perfil' => []],
    'inicio'                                                         => ['controller' => 'Login', 'action' => 'inicio', 'perfil' => [1, 2]],
]);
