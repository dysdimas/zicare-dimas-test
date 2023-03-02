<?php
$router = $di->getRouter();
// zicare-dimas route
// Route LIST PASIEN
$router->add('/api/v1/pasien/list', [
    'controller' => 'pasien',
    'action' => 'list',
]);

// Route DETAIL PASIEN
$router->add('/api/v1/pasien/detail/{id:[0-9]+}', [
    'controller' => 'pasien',
    'action' => 'detail',
]);

// Route ADD PASIEN
$router->addPost('/api/v1/pasien', [
    'controller' => 'pasien',
    'action' => 'create',
]);

// Route UPDATE PASIEN
$router->addPut('/api/v1/pasien/{id:[0-9]+}', [
    'controller' => 'pasien',
    'action' => 'update',
]);

// Route DELETE PASIEN
$router->addDelete('/api/v1/pasien/{id:[0-9]+}', [
    'controller' => 'pasien',
    'action' => 'delete',
]);

$router->handle($_SERVER['REQUEST_URI']);
