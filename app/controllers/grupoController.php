<?php
namespace App\Controllers;
use App\Models\GrupoModel;
use App\Models\ProgramaModel;

require_once "baseController.php";
require_once MAIN_APP_ROUTE."../models/GrupoModel.php";
require_once MAIN_APP_ROUTE."../models/ProgramaModel.php";

class GrupoController extends BaseController{
    public function __construct(){
        //Se define la plantilla para este controlador
        $this->layout = "admin_layout";
        //Llamamos al contructor del padre
        parent::__construct();
    }
    public function index(){
        echo "<br>CONTROLLER> grupoController";
        echo "<br>ACTION> index";
    }
    
    public function view(){
        $grupoObj = new GrupoModel();
        $grupos = $grupoObj->getAll();
        $data = [
            "grupos"=>$grupos,
            "titulo" => "Lista de grupos"
        ];
        $this->render('grupo/viewGrupo.php', $data);
    }

    public function newGrupo(){
        $programaObj = new ProgramaModel();
        $programas = $programaObj->getAll();

        $data = [
            "programas" => $programas,
            "titulo" => "Nuevo grupo"
        ];

        $this->render('grupo/newGrupo.php', $data);
    }

    public function createGrupo(){
        if (isset($_POST["ficha"])) {
            $ficha = $_POST["ficha"] ?? null;
            $cantAprendices = $_POST["cantAprendices"] ?? null;
            $estado = $_POST["estado"] ?? null;
            $fechaIniLectiva = $_POST["fechaIniLectiva"] ?? null;
            $FechaFinLectiva = $_POST["fechaFinLectiva"] ?? null;
            $fkIdProgForm = $_POST["fkIdProgForm"] ?? null;
            $grupoObj = new GrupoModel();
            $grupoObj->saveGrupo($ficha, $cantAprendices, $estado, $fechaIniLectiva, $FechaFinLectiva, $fkIdProgForm);
            $this->redirectTo("grupo/view");
        }
    }

    public function viewGrupo($id){
        $grupoObj = new GrupoModel();
        $grupoInfo = $grupoObj->getGrupo($id);
        $data = [
            "grupo" => $grupoInfo,
            "titulo" => "Ver grupo ".$grupoInfo->ficha
        ];
        $this->render("grupo/viewOneGrupo.php", $data);
    }

    public function editGrupo($id){
        $grupoObj = new GrupoModel();
        $grupoInfo = $grupoObj->getGrupo($id);
        $data = [
            "grupo" => $grupoInfo,
            "titulo" => "Editar grupo"
        ];
        $this->render("grupo/editGrupo.php", $data);
    }

    public function updateGrupo(){
        if (isset($_POST["ficha"])) {
            $id = $_POST["id"] ?? null;
            $ficha = $_POST["ficha"] ?? null;
            $cantAprendices = $_POST["cantAprendices"] ?? null;
            $estado = $_POST["estado"] ?? null;
            $fechaIniLectiva = $_POST["fechaIniLectiva"] ?? null;
            $fechaFinLectiva = $_POST["fechaFinLectiva"] ?? null;
            $fkIdProgForm = $_POST["fkIdProgForm"] ?? null;
            $grupoObj = new GrupoModel();
            $grupoObj->editGrupo($id ,$ficha, $cantAprendices, $estado, $fechaIniLectiva, $fechaFinLectiva, $fkIdProgForm);
        }
        $this->redirectTo("grupo/view");
    }

    public function deleteGrupo($id){
        $grupoObj = new GrupoModel();
        $grupoObj->deleteGrupo($id);
        $this->redirectTo("grupo/view");
    }
}