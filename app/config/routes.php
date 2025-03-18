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
    '/login/init' => [
        "controller" => 'App\Controllers\LoginController',
        "action" => 'initLogin'
    ],
    '/login/initAdministrador' => [
        "controller" => 'App\Controllers\LoginController',
        "action" => 'initAdministrador'
    ],
    '/login/initCoordinador' => [
        "controller" => 'App\Controllers\LoginController',
        "action" => 'initCoordinador'
    ],
    '/login/initInstructor' => [
        "controller" => 'App\Controllers\LoginController',
        "action" => 'initInstructor'
    ],
    '/administrador/index' => [
        "controller" => 'App\Controllers\AdministradorController',
        "action" => 'index'
    ],
    '/coordinador/index' => [
        "controller" => 'App\Controllers\CoordinadorController',
        "action" => 'index'
    ],
    '/instructor/index' => [
        "controller" => 'App\Controllers\InstructorController',
        "action" => 'index'
    ],
    '/login/logout' => [
        "controller" => 'App\Controllers\LoginController',
        "action" => 'LogoutLogin'
    ],
    '/administrador/view' => [
        "controller" => 'App\Controllers\AdministradorController',
        "action" => 'view'
    ],
    '/administrador/new' => [
        "controller" => 'App\Controllers\AdministradorController',
        "action" => 'new'
    ],
    '/administrador/create' => [
        "controller" => 'App\Controllers\AdministradorController',
        "action" => 'create'
    ],
    '/administrador/view/(\d+)' => [
        "controller" => 'App\Controllers\AdministradorController',
        "action" => 'viewOne'
    ],
    '/administrador/edit/(\d+)' => [
        "controller" => 'App\Controllers\AdministradorController',
        "action" => 'edit'
    ],
    '/administrador/update' => [
        "controller" => 'App\Controllers\AdministradorController',
        "action" => 'update'
    ],
    '/administrador/delete/(\d+)' => [
        "controller" => 'App\Controllers\AdministradorController',
        "action" => 'delete'
    ],
    '/centro/view' => [
        "controller" => 'App\Controllers\CentroController',
        "action" => 'view'
    ],
    '/centro/new' => [
        "controller" => 'App\Controllers\CentroController',
        "action" => 'new'
    ],
    '/centro/create' => [
        "controller" => 'App\Controllers\CentroController',
        "action" => 'create'
    ],
    '/centro/view/(\d+)' => [
        "controller" => 'App\Controllers\CentroController',
        "action" => 'viewOne'
    ],
    '/centro/edit/(\d+)' => [
        "controller" => 'App\Controllers\CentroController',
        "action" => 'edit'
    ],
    '/centro/update' => [
        "controller" => 'App\Controllers\CentroController',
        "action" => 'update'
    ],
    '/centro/delete/(\d+)' => [
        "controller" => 'App\Controllers\CentroController',
        "action" => 'delete'
    ],
    '/coordinador/view' => [
        "controller" => 'App\Controllers\CoordinadorController',
        "action" => 'view'
    ],
    '/coordinador/new' => [
        "controller" => 'App\Controllers\CoordinadorController',
        "action" => 'new'
    ],
    '/coordinador/create' => [
        "controller" => 'App\Controllers\CoordinadorController',
        "action" => 'create'
    ],
    '/coordinador/view/(\d+)' => [
        "controller" => 'App\Controllers\CoordinadorController',
        "action" => 'viewOne'
    ],
    '/coordinador/edit/(\d+)' => [
        "controller" => 'App\Controllers\CoordinadorController',
        "action" => 'edit'
    ],
    '/coordinador/update' => [
        "controller" => 'App\Controllers\CoordinadorController',
        "action" => 'update'
    ],
    '/coordinador/delete/(\d+)' => [
        "controller" => 'App\Controllers\CoordinadorController',
        "action" => 'delete'
    ],
    '/programa/view' => [
        "controller" => 'App\Controllers\ProgramaController',
        "action" => 'view'
    ],
    '/programa/new' => [
        "controller" => 'App\Controllers\ProgramaController',
        "action" => 'new'
    ],
    '/programa/create' => [
        "controller" => 'App\Controllers\ProgramaController',
        "action" => 'create'
    ],
    '/programa/view/(\d+)' => [
        "controller" => 'App\Controllers\ProgramaController',
        "action" => 'viewOne'
    ],
    '/programa/edit/(\d+)' => [
        "controller" => 'App\Controllers\ProgramaController',
        "action" => 'edit'
    ],
    '/programa/update' => [
        "controller" => 'App\Controllers\ProgramaController',
        "action" => 'update'
    ],
    '/programa/delete/(\d+)' => [
        "controller" => 'App\Controllers\ProgramaController',
        "action" => 'delete'
    ],
    '/ambiente/view' => [
        "controller" => 'App\Controllers\AmbienteController',
        "action" => 'view'
    ],
    '/ambiente/new' => [
        "controller" => 'App\Controllers\AmbienteController',
        "action" => 'new'
    ],
    '/ambiente/create' => [
        "controller" => 'App\Controllers\AmbienteController',
        "action" => 'create'
    ],
    '/ambiente/view/(\d+)' => [
        "controller" => 'App\Controllers\AmbienteController',
        "action" => 'viewOne'
    ],
    '/ambiente/edit/(\d+)' => [
        "controller" => 'App\Controllers\AmbienteController',
        "action" => 'edit'
    ],
    '/ambiente/update' => [
        "controller" => 'App\Controllers\AmbienteController',
        "action" => 'update'
    ],
    '/ambiente/delete/(\d+)' => [
        "controller" => 'App\Controllers\AmbienteController',
        "action" => 'delete'
    ],
    '/ficha/view' => [
        "controller" => 'App\Controllers\FichaController',
        "action" => 'view'
    ],
    '/ficha/new' => [
        "controller" => 'App\Controllers\FichaController',
        "action" => 'new'
    ],
    '/ficha/create' => [
        "controller" => 'App\Controllers\FichaController',
        "action" => 'create'
    ],
    '/ficha/view/(\d+)' => [
        "controller" => 'App\Controllers\FichaController',
        "action" => 'viewOne'
    ],
    '/ficha/edit/(\d+)' => [
        "controller" => 'App\Controllers\FichaController',
        "action" => 'edit'
    ],
    '/ficha/update' => [
        "controller" => 'App\Controllers\FichaController',
        "action" => 'update'
    ],
    '/ficha/delete/(\d+)' => [
        "controller" => 'App\Controllers\FichaController',
        "action" => 'delete'
    ],
    '/instructor/view' => [
        "controller" => 'App\Controllers\InstructorController',
        "action" => 'view'
    ],
    '/instructor/new' => [
        "controller" => 'App\Controllers\InstructorController',
        "action" => 'new'
    ],
    '/instructor/create' => [
        "controller" => 'App\Controllers\InstructorController',
        "action" => 'create'
    ],
    '/instructor/view/(\d+)' => [
        "controller" => 'App\Controllers\InstructorController',
        "action" => 'viewOne'
    ],
    '/instructor/edit/(\d+)' => [
        "controller" => 'App\Controllers\InstructorController',
        "action" => 'edit'
    ],
    '/instructor/update' => [
        "controller" => 'App\Controllers\InstructorController',
        "action" => 'update'
    ],
    '/instructor/delete/(\d+)' => [
        "controller" => 'App\Controllers\InstructorController',
        "action" => 'delete'
    ],
    '/competencia/view' => [
        "controller" => 'App\Controllers\CompetenciaController',
        "action" => 'view'
    ],
    '/competencia/new' => [
        "controller" => 'App\Controllers\CompetenciaController',
        "action" => 'new'
    ],
    '/competencia/create' => [
        "controller" => 'App\Controllers\CompetenciaController',
        "action" => 'create'
    ],
    '/competencia/view/(\d+)' => [
        "controller" => 'App\Controllers\CompetenciaController',
        "action" => 'viewOne'
    ],
    '/competencia/edit/(\d+)' => [
        "controller" => 'App\Controllers\CompetenciaController',
        "action" => 'edit'
    ],
    '/competencia/update' => [
        "controller" => 'App\Controllers\CompetenciaController',
        "action" => 'update'
    ],
    '/competencia/delete/(\d+)' => [
        "controller" => 'App\Controllers\CompetenciaController',
        "action" => 'delete'
    ],
    '/aprendiz/view' => [
        "controller" => 'App\Controllers\AprendizController',
        "action" => 'view'
    ],
    '/aprendiz/new' => [
        "controller" => 'App\Controllers\AprendizController',
        "action" => 'new'
    ],
    '/aprendiz/create' => [
        "controller" => 'App\Controllers\AprendizController',
        "action" => 'create'
    ],
    '/aprendiz/view/(\d+)' => [
        "controller" => 'App\Controllers\AprendizController',
        "action" => 'viewOne'
    ],
    '/aprendiz/edit/(\d+)' => [
        "controller" => 'App\Controllers\AprendizController',
        "action" => 'edit'
    ],
    '/aprendiz/update' => [
        "controller" => 'App\Controllers\AprendizController',
        "action" => 'update'
    ],
    '/aprendiz/delete/(\d+)' => [
        "controller" => 'App\Controllers\AprendizController',
        "action" => 'delete'
    ],
    '/asistencia/view' => [
        "controller" => 'App\Controllers\AsistenciaController',
        "action" => 'view'
    ],
    '/asistencia/new' => [
        "controller" => 'App\Controllers\AsistenciaController',
        "action" => 'new'
    ],
    '/asistencia/newIndex' => [
        "controller" => 'App\Controllers\AsistenciaController',
        "action" => 'newIndex'
    ],
    '/asistencia/create' => [
        "controller" => 'App\Controllers\AsistenciaController',
        "action" => 'create'
    ],
    '/asistencia/update' => [
        "controller" => 'App\Controllers\AsistenciaController',
        "action" => 'update'
    ],
    '/asistencia/reporte' => [
        "controller" => 'App\Controllers\AsistenciaController',
        "action" => 'reporte'
    ],
    '/asistencia/viewOne/(\d+)' => [
        "controller" => 'App\Controllers\AsistenciaController',
        "action" => 'viewOne'
    ],
];