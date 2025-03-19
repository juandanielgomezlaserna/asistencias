<?php
namespace App\Controllers;

use App\Models\CentroModel;
use App\Models\FichaModel;
use App\Models\ProgramaModel;

require_once "baseController.php";
require_once MAIN_APP_ROUTE."../models/FichaModel.php";
require_once MAIN_APP_ROUTE."../models/ProgramaModel.php";
require_once MAIN_APP_ROUTE."../models/CoordinadorModel.php";
require_once MAIN_APP_ROUTE."../models/CentroModel.php";

class FichaController extends BaseController{
    public function __construct(){
        //Se define la plantilla para este controlador
        $this->layout = "admin_layout";
    }

    public function view(){
        $obj = new FichaModel();
        $items = $obj->getFichasCoordinador($_SESSION["coordinador"]);
        $data = [
            "fichas"=>$items,
            "titulo" => "Lista de fichas"
        ];
        $this->render('ficha/view.php', $data);
    }

    public function new(){
        $centroObj = new CentroModel();
        $centroId = $centroObj->getCentroCoordinador($_SESSION["coordinador"]);
        $programaObj = new ProgramaModel();
        $programas = $programaObj->getAllcentros($centroId);

        $data = [
            "programas" => $programas,
            "titulo" => "Nueva ficha"
        ];

        $this->render('ficha/new.php', $data);
    }

    public function create(){
        if (isset($_POST["ficha"])) {
            $ficha = $_POST["ficha"] ?? null;
            $idPrograma = $_POST["idPrograma"] ?? null;
            $cantAprendices = $_POST["cantAprendices"] ?? null;
            $obj = new FichaModel();
            $obj->saveFicha($ficha, $cantAprendices, $idPrograma);
            $this->redirectTo("ficha/view");
        }
    }

    public function viewOne($id){
        $obj = new FichaModel();
        $info = $obj->getFicha($id);
        $data = [
            "ficha" => $info,
            "titulo" => "Ver ficha ".$info->ficha
        ];
        $this->render("ficha/viewOne.php", $data);
    }

    public function edit($id){
        $obj = new FichaModel();
        $info = $obj->getFicha($id);
        $centroObj = new CentroModel();
        $centroId = $centroObj->getCentroCoordinador($_SESSION["coordinador"]);
        $programaObj = new ProgramaModel();
        $programas = $programaObj->getAllcentros($centroId);
        $data = [
            "ficha" => $info,
            "titulo" => "Editar ficha",
            "programas" => $programas
        ];
        $this->render("ficha/edit.php", $data);
    }

    public function update(){
        if (isset($_POST["id"])) {
            $id = $_POST["id"] ?? null;
            $ficha = $_POST["ficha"] ?? null;
            $idPrograma = $_POST["idPrograma"] ?? null;
            $cantAprendices = $_POST["cantAprendices"] ?? null;
            $obj = new FichaModel();
            $obj->editFicha($id, $ficha, $cantAprendices, $idPrograma);
        }
        $this->redirectTo("ficha/view");
    }

    public function delete($id){
        $obj = new FichaModel();
        $obj->deleteFicha($id);
        $this->redirectTo("ficha/view");
    }
}