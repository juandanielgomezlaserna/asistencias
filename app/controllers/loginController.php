<?php
namespace App\Controllers;

use App\Models\AdministradorModel;
use App\Models\CoordinadorModel;
use App\Models\InstructorModel;

require_once "baseController.php";
require_once MAIN_APP_ROUTE."../models/AdministradorModel.php";
require_once MAIN_APP_ROUTE."../models/CoordinadorModel.php";
require_once MAIN_APP_ROUTE."../models/InstructorModel.php";


class LoginController extends BaseController{
    public function __construct() {
        $this->layout = "login_layout";
    }
    public function initLogin(){
        session_destroy();
        if (isset($_POST["tipoUsuario"])) {
            $tipoUsuario = $_POST["tipoUsuario"] ?? null;
            if ($tipoUsuario == "administrador") {
                $this->render("login/administradorLogin.php");
            }else if($tipoUsuario == "coordinador"){
                $this->render("login/coordinadorLogin.php");
            }else if($tipoUsuario == "instructor"){
                $this->render("login/instructorLogin.php");
            }
        }else{
            $this->render("login/login.php");
        }
    }

    public function initAdministrador(){
        if (isset($_POST["id"]) && isset($_POST["cedula"])) {
            $id = $_POST["id"] ?? null;
            $cedula = $_POST["cedula"] ?? null;
            if ($id != null && $cedula != null) {
                $administradorObj = new AdministradorModel();
                $resp = $administradorObj->validarLogin($id, $cedula);
                if ($resp) {
                    $this->redirectTo("administrador/index");
                }else{
                    $errors = "El id y/o cédula son incorrectos";
                }
            }else{
                $errors = "El id y/o cédula no pueden ser vacíos";
            }
            $data = [
                "errors" => $errors
            ];
            $this->render("login/administradorLogin.php", $data);
        }else{
            $this->render("login/administradorLogin.php");
        }
    }

    public function initCoordinador(){
        if (isset($_POST["id"]) && isset($_POST["cedula"])) {
            $id = $_POST["id"] ?? null;
            $cedula = $_POST["cedula"] ?? null;
            if ($id != null && $cedula != null) {
                $coordinadorObj = new CoordinadorModel();
                $resp = $coordinadorObj->validarLogin($id, $cedula);
                if ($resp) {
                    $this->redirectTo("coordinador/index");
                }else{
                    $errors = "El id y/o cédula son incorrectos";
                }
            }else{
                $errors = "El id y/o cédula no pueden ser vacíos";
            }
            $data = [
                "errors" => $errors
            ];
            $this->render("login/coordinadorLogin.php", $data);
        }else{
            $this->render("login/coordinadorLogin.php");
        }
    }

    public function initInstructor(){
        if (isset($_POST["id"]) && isset($_POST["cedula"])) {
            $id = $_POST["id"] ?? null;
            $cedula = $_POST["cedula"] ?? null;
            if ($id != null && $cedula != null) {
                $instructorObj = new InstructorModel();
                $resp = $instructorObj->validarLogin($id, $cedula);
                if ($resp) {
                    $this->redirectTo("instructor/index");
                }else{
                    $errors = "El id y/o cédula son incorrectos";
                }
            }else{
                $errors = "El id y/o cédula no pueden ser vacíos";
            }
            $data = [
                "errors" => $errors
            ];
            $this->render("login/instructorLogin.php", $data);
        }else{
            $this->render("login/instructorLogin.php");
        }
    }

    public function logoutLogin(){
        session_destroy();
        header("Location: /login/init");
    }
}