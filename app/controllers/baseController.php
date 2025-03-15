<?php
namespace App\Controllers;
//Se inicia la sesion
session_start();

use ValueError;

class BaseController{
    protected string $layout = "main_layout";

    public function __construct(){
        //validar el tiempo de inactividad de un usuario
        // El tiempo no debe superar lo configurado en INACTIVE_TIME
        if (isset($_SESSION["timeOut"])) {
            // Se calcula el tiempo de sesion transcurrido
            $tiempoSesion = time() - $_SESSION["timeOut"];
            if ($tiempoSesion > INACTIVE_TIME*60) {
                // Se destruye la session por inactividad
                session_destroy();
                header("Location: /login/login");
            }else{
                //Se actualiza el tiemp de sesión
                $_SESSION["timeOut"] = time();
            }
        }
    }

    public function render(string $view, array $arrayData=null){
        if (isset($arrayData) && is_array($arrayData)) {
            foreach ($arrayData as $key => $value) {
                $$key = $value;
            }
        }
        $content = MAIN_APP_ROUTE."../views/$view";
        $layout = MAIN_APP_ROUTE."../views/layouts/{$this->layout}.php";
        include_once $layout;
    }
    public function formatNumber(){
        echo "<br>Formatea el numero";
    }
    public function redirectTo($view){
        header("Location: /$view");
    }
}