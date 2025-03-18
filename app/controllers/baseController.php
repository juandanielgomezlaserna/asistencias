<?php
namespace App\Controllers;
//Se inicia la sesion
session_start();

use ValueError;

class BaseController{
    protected string $layout = "main_layout";

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