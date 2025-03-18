<?php
namespace App\Controllers;

use App\Models\CompetenciaModel;
use App\Models\FichaModel;
use App\Models\InstructorModel;

require_once "baseController.php";
require_once MAIN_APP_ROUTE."../models/CompetenciaModel.php";
require_once MAIN_APP_ROUTE."../models/FichaModel.php";
require_once MAIN_APP_ROUTE."../models/InstructorModel.php";

class CompetenciaController extends BaseController{
    public function __construct(){
        $this->layout = "admin_layout";
    }

    public function view(){
        $_SESSION["errors"] = "";
        $competencia = new CompetenciaModel();
        $items = $competencia->getAllInstructor($_SESSION["instructor"]);
        $data = [
            "competencias"=>$items,
            "titulo" => "Lista de competencias"
        ];
        $this->render('competencia/view.php', $data);
    }

    public function new(){
        $idInstructor = $_SESSION["instructor"];
        $instructorObj = new InstructorModel();
        $centroId = $instructorObj->getCentro($idInstructor);
        $fichaObj = new FichaModel();
        $fichas = $fichaObj->getFichaInstructor($centroId);
        $data = [
            "fichas" => $fichas,
            "titulo" => "Nueva competencia",
            "idInstructor" => $idInstructor
        ];

        $this->render('competencia/new.php', $data);
    }

    public function create(){
        if (isset($_POST["nombre"])) {
            $nombre = $_POST["nombre"] ?? null;
            $descripcion = $_POST["descripcion"] ?? null;
            $horaInicio = $_POST["horaInicio"] ?? null;
            $horaFin = $_POST["horaFin"] ?? null;
            $idInstructor = $_POST["idInstructor"] ?? null;
            $idFicha = $_POST["idFicha"] ?? null;
            $obj = new CompetenciaModel();
            $obj->saveCompetencia($nombre, $descripcion, $horaInicio, $horaFin, $idInstructor, $idFicha);
            $this->redirectTo("competencia/view");
        }
    }

    public function viewOne($id){
        $obj = new CompetenciaModel();
        $info = $obj->getCompetencia($id);
        $data = [
            "competencia" => $info,
            "titulo" => "Ver competencia ".$info->nombre
        ];
        $this->render("competencia/viewOne.php", $data);
    }

    public function edit($id){
        $obj = new CompetenciaModel();
        $info = $obj->getCompetencia($id);
        $idInstructor = $_SESSION["instructor"];
        $instructorObj = new InstructorModel();
        $centroId = $instructorObj->getCentro($idInstructor);
        $fichaObj = new FichaModel();
        $fichas = $fichaObj->getFichaInstructor($centroId);
        $data = [
            "competencia" => $info,
            "titulo" => "Editar competencia",
            "idInstructor" => $idInstructor,
            "fichas" => $fichas
        ];
        $this->render("competencia/edit.php", $data);
    }

    public function update(){
        if (isset($_POST["id"])) {
            $id = $_POST["id"] ?? null;
            $nombre = $_POST["nombre"] ?? null;
            $descripcion = $_POST["descripcion"] ?? null;
            $horaInicio = $_POST["horaInicio"] ?? null;
            $horaFin = $_POST["horaFin"] ?? null;
            $idInstructor = $_POST["idInstructor"] ?? null;
            $idFicha = $_POST["idFicha"] ?? null;
            $obj = new CompetenciaModel();
            $obj->editCompetencia($id, $nombre, $descripcion, $horaInicio, $horaFin, $idInstructor, $idFicha);
            $this->redirectTo("competencia/view");
        }
    }

    public function delete($id){
        $obj = new CompetenciaModel();
        $obj->deleteCompetencia($id);
        $this->redirectTo("competencia/view");
    }
}