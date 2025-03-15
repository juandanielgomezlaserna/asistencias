<?php
return [
    "/" => [
        "controller" => 'App\Controllers\Homecontroller',
        "action" => 'index'
    ],
    '/home' => [
        "controller" => 'App\Controllers\Homecontroller',
        "action" => 'index'
    ],
    '/hello' => [
        "controller" => 'App\Controllers\Homecontroller',
        "action" => 'saludar'
    ],
    '/grupo/index' => [
        "controller" => 'App\Controllers\GrupoController',
        "action" => 'index'
    ],
    '/grupo/view' => [
        "controller" => 'App\Controllers\GrupoController',
        "action" => 'view'
    ],
    '/grupo/new' => [
        "controller" => 'App\Controllers\GrupoController',
        "action" => 'newGrupo'
    ],
    '/grupo/create' => [
        "controller" => 'App\Controllers\GrupoController',
        "action" => 'createGrupo'
    ],
    '/grupo/view/(\d+)' => [
        "controller" => 'App\Controllers\GrupoController',
        "action" => 'viewGrupo'
    ],
    '/grupo/edit/(\d+)' => [
        "controller" => 'App\Controllers\GrupoController',
        "action" => 'editGrupo'
    ],
    '/grupo/update' => [
        "controller" => 'App\Controllers\GrupoController',
        "action" => 'updateGrupo'
    ],
    '/grupo/delete/(\d+)' => [
        "controller" => 'App\Controllers\GrupoController',
        "action" => 'deleteGrupo'
    ],
    '/controlProgreso/index' => [
        "controller" => 'App\Controllers\ControlProgresoController',
        "action" => 'index'
    ]
];