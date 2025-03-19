<?php
namespace App\Controllers;

use App\Models\CentroModel;
use App\Models\InstructorModel;

require_once "baseController.php";
require_once MAIN_APP_ROUTE."../models/InstructorModel.php";
require_once MAIN_APP_ROUTE."../models/CentroModel.php";
require_once MAIN_APP_ROUTE."../models/CoordinadorModel.php";

class InstructorController extends BaseController{
    public function __construct(){
        //Se define la plantilla para este controlador
        $this->layout = "admin_layout";
    }

    public function index(){
        $obj = new InstructorModel();
        $info = $obj->getInstructor($_SESSION["instructor"]);
        $data = [
            "titulo" => "Instructor interfaz",
            "instructor" => $info
        ];
        $this->render("instructor/index.php", $data);
    }

    public function view(){
        $obj = new InstructorModel();
        $items = $obj->getInstructoresCoordinador($_SESSION["coordinador"]);
        $data = [
            "instructores"=>$items,
            "titulo" => "Lista de instructores"
        ];
        $this->render('instructor/view.php', $data);
    }

    public function new(){
        $centroObj = new CentroModel();
        $idCentro = $centroObj->getCentroCoordinador($_SESSION["coordinador"]);

        $data = [
            "idCentro" => $idCentro,
            "titulo" => "Nuevo instructor"
        ];

        $this->render('instructor/new.php', $data);
    }

    public function create(){
        if (isset($_POST["nombre"])) {
            $nombre = $_POST["nombre"] ?? null;
            $cedula = $_POST["cedula"] ?? null;
            $idCentro = $_POST["idCentro"] ?? null;
            $obj = new InstructorModel();
            $obj->saveInstructor($nombre, $cedula, $idCentro);
            $this->redirectTo("instructor/view");
        }
    }

    public function viewOne($id){
        $obj = new InstructorModel();
        $info = $obj->getInstructor($id);
        $data = [
            "instructor" => $info,
            "titulo" => "Ver instructor ".$info->nombre
        ];
        $this->render("instructor/viewOne.php", $data);
    }

    public function edit($id){
        $obj = new InstructorModel();
        $info = $obj->getinstructor($id);
        $centroObj = new CentroModel();
        $idCentro = $centroObj->getCentroCoordinador($_SESSION["coordinador"]);
        $data = [
            "instructor" => $info,
            "titulo" => "Editar instructor",
            "idCentro" => $idCentro
        ];
        $this->render("instructor/edit.php", $data);
    }

    public function update(){
        if (isset($_POST["id"])) {
            $id = $_POST["id"] ?? null;
            $nombre = $_POST["nombre"] ?? null;
            $cedula = $_POST["cedula"] ?? null;
            $idCentro = $_POST["idCentro"] ?? null;
            $obj = new InstructorModel();
            $obj->editinstructor($id, $nombre, $cedula, $idCentro);
        }
        $this->redirectTo("instructor/view");
    }

    public function delete($id){
        $obj = new InstructorModel();
        $obj->deleteinstructor($id);
        $this->redirectTo("instructor/view");
    }
}