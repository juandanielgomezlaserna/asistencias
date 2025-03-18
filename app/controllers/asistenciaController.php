<?php
namespace App\Controllers;

use App\Models\AprendizModel;
use App\Models\AsistenciaModel;
use App\Models\CompetenciaModel;
use App\Models\InstructorModel;

require_once "baseController.php";
require_once MAIN_APP_ROUTE."../models/AsistenciaModel.php";
require_once MAIN_APP_ROUTE."../models/CompetenciaModel.php";

class AsistenciaController extends BaseController{
    public function __construct(){
        $this->layout = "admin_layout";
    }

    public function view(){
        $obj = new AsistenciaModel();
        $items = $obj->getAsistencias($_SESSION["instructor"]);
        $errors = isset($_SESSION["errors"]) ? $_SESSION["errors"]:null;

        $data = [
            "asistencias"=>$items,
            "titulo" => "Lista de asistencias",
            "errors" => $errors
        ];
        $this->render('asistencia/view.php', $data);
    }

    public function new(){
        $_SESSION["errors"] = "";
        $competenciaObj = new CompetenciaModel();
        $competencias = $competenciaObj->getAllInstructor($_SESSION["instructor"]);
        $data = [
            "competencias" => $competencias,
            "titulo" => "Nuevo ambiente",
        ];

        $this->render('asistencia/new.php', $data);
    }

    public function newIndex(){
        if(isset($_POST["fecha"])){
            $asistenciaObj = new AsistenciaModel();
            if ($asistenciaObj->exist($_POST["fecha"], $_POST["idCompetencia"])) {
                $_SESSION["errors"] = "Esta asistencia ya existe";
                $this->redirectTo("asistencia/view");
            }
            $fecha = $_POST["fecha"] ?? null;
            $idCompetencia = $_POST["idCompetencia"] ?? null;
            $aprendizObj = new AprendizModel();
            $aprendices = $aprendizObj->getAllCompetencia($idCompetencia);
            $obj = new AsistenciaModel();
            $info = $obj->getInfo($idCompetencia);
            $instructorObj = new InstructorModel();
            $instructor = $instructorObj->getInstructor($_SESSION["instructor"]);
            $diferencia_segundos = strtotime($info->horaFin) - strtotime($info->horaInicio);
            $cantHoras = $diferencia_segundos / 3600;
            $data = [
                "titulo" => "Asistencia de ".$instructor->nombre,
                "info" => $info,
                "idCompetencia" => $idCompetencia,
                "aprendices" => $aprendices,
                "fecha" => $fecha,
                "cantHoras" => $cantHoras
            ];

            $this->render("asistencia/newIndex.php", $data);
        }
    }

    public function create(){
        if (isset($_POST["idCompetencia"])) {
            $idCompetencia = $_POST["idCompetencia"] ?? null;
            $fecha = $_POST["fecha"];
            $aprendizObj = new AprendizModel();
            $aprendices = $aprendizObj->getAllCompetencia($idCompetencia);
            foreach($aprendices as $aprendiz){
                $idAprendiz = $_POST["aprendiz$aprendiz->id"];
                $asistencia = $_POST["asistencia$aprendiz->id"];
                $cantHoras = 0;
                if ($asistencia == "no asistio") {
                    $cantHoras = $_POST["cantHoras"];
                }else if($asistencia == "asistio"){
                    $cantHoras = 0;
                }else if($asistencia == "cantHoras"){
                    $cantHoras = $_POST["cantHoras$aprendiz->id"];
                }else if($asistencia == "excusa"){
                    $cantHoras = -1;
                }
                $asistenciaObj = new AsistenciaModel();
                $asistenciaObj->saveAsistencia($fecha, $idCompetencia, $idAprendiz, $cantHoras);
            }
            $this->redirectTo("asistencia/view");
        }
    }

    public function viewOne($id){
        $asistenciaObj = new AsistenciaModel();
        $asistencia = $asistenciaObj->getAsistencia($id);
        $idCompetencia = $asistencia->fkIdCompetencia;
        $asistencias = $asistenciaObj->getAsistenciasEdit($asistencia->fecha, $idCompetencia);
        $obj = new AsistenciaModel();
        $info = $obj->getInfo($idCompetencia);
        $instructorObj = new InstructorModel();
        $instructor = $instructorObj->getInstructor($_SESSION["instructor"]);
        $diferencia_segundos = strtotime($info->horaFin) - strtotime($info->horaInicio);
        $cantHoras = $diferencia_segundos / 3600;
        $data = [
            "titulo" => "Asistencia de ".$instructor->nombre,
            "info" => $info,
            "idCompetencia" => $idCompetencia,
            "fecha" => $asistencia->fecha,
            "cantHoras" => $cantHoras,
            "asistencias" => $asistencias
        ];
        $this->render("asistencia/viewOne.php", $data);
    }

    public function update(){
        if (isset($_POST["idCompetencia"])) {
            $idCompetencia = $_POST["idCompetencia"] ?? null;
            $fecha = $_POST["fecha"];
            $aprendizObj = new AprendizModel();
            $aprendices = $aprendizObj->getAllCompetencia($idCompetencia);
            foreach($aprendices as $aprendiz){
                $idAprendiz = $_POST["aprendiz$aprendiz->id"];
                $asistencia = $_POST["asistencia$aprendiz->id"];
                $idAsistencia = $_POST["id$aprendiz->id"];
                $cantHoras = 0;
                if ($asistencia == "no asistio") {
                    $cantHoras = $_POST["cantHoras"];
                }else if($asistencia == "asistio"){
                    $cantHoras = 0;
                }else if($asistencia == "cantHoras"){
                    $cantHoras = $_POST["cantHoras$aprendiz->id"];
                }else if($asistencia == "excusa"){
                    $cantHoras = -1;
                }
                echo $asistencia;
                $asistenciaObj = new AsistenciaModel();
                $asistenciaObj->editAsistencia($idAsistencia, $fecha, $idCompetencia, $idAprendiz, $cantHoras);
            };
        }
        $this->redirectTo("asistencia/view");
    }

    public function reporte(){
        $_SESSION["errors"] = "";
        $obj = new AsistenciaModel();
        $items = $obj->getReportes($_SESSION["instructor"]);
        $data = [
            "reportes"=>$items,
            "titulo" => "Reportes de inasistencias"
        ];
        $this->render('asistencia/reporte.php', $data);
    }

}