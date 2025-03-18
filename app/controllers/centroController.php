<?php
namespace App\Controllers;

use App\Models\AdministradorModel;
use App\Models\AmbienteModel;
use App\Models\centroModel;
use App\Models\RegionalModel;
use App\Models\CoordinadorModel;

require_once "baseController.php";
require_once MAIN_APP_ROUTE."../models/centroModel.php";
require_once MAIN_APP_ROUTE."../models/RegionalModel.php";
require_once MAIN_APP_ROUTE."../models/CoordinadorModel.php";
require_once MAIN_APP_ROUTE."../models/AdministradorModel.php";

class CentroController extends BaseController{
    public function __construct(){
        //Se define la plantilla para este controlador
        $this->layout = "admin_layout";
    }

    public function view(){
        $obj = new CentroModel();
        $administradorObj = new AdministradorModel();
        $regionalId = $administradorObj->getAdministrador($_SESSION["administrador"])->fkIdRegional;
        $items = $obj->getAllAdministrador($regionalId);
        $data = [
            "centros"=>$items,
            "titulo" => "Lista de centros"
        ];
        $this->render('centro/view.php', $data);
    }

    public function new(){
        $administradorObj = new AdministradorModel();
        $regionalId = $administradorObj->getAdministrador($_SESSION["administrador"])->fkIdRegional;
        $coordinadorObj = new CoordinadorModel();
        $coordinadores = $coordinadorObj->getAllAdministrador($regionalId);

        $data = [
            "regionalId" => $regionalId,
            "titulo" => "Nuevo centro",
            "coordinadores" => $coordinadores
        ];

        $this->render('centro/new.php', $data);
    }

    public function create(){
        if (isset($_POST["nombre"])) {
            $nombre = $_POST["nombre"] ?? null;
            $idRegional = $_POST["idRegional"] ?? null;
            $idCoordinador = $_POST["idCoordinador"] ?? null;
            $obj = new centroModel();
            $obj->saveCentro($nombre, $idRegional, $idCoordinador);
            $this->redirectTo("centro/view");
        }
    }

    public function viewOne($id){
        $obj = new centroModel();
        $info = $obj->getCentro($id);
        $data = [
            "centro" => $info,
            "titulo" => "Ver centro ".$info->nombre
        ];
        $this->render("centro/viewOne.php", $data);
    }

    public function edit($id){
        $obj = new centroModel();
        $info = $obj->getCentro($id);
        $administradorObj = new AdministradorModel();
        $regionalId = $administradorObj->getAdministrador($_SESSION["administrador"])->fkIdRegional;
        $coordinadorObj = new CoordinadorModel();
        $coordinadores = $coordinadorObj->getAllAdministrador($regionalId);
        $data = [
            "centro" => $info,
            "titulo" => "Editar administrador",
            "regionalId" => $regionalId,
            "coordinadores" => $coordinadores
        ];
        $this->render("centro/edit.php", $data);
    }

    public function update(){
        if (isset($_POST["id"])) {
            $id = $_POST["id"] ?? null;
            $idRegional = $_POST["idRegional"] ?? null;
            $nombre = $_POST["nombre"] ?? null;
            $idCoordinador = $_POST["idCoordinador"] ?? null;
            $obj = new centroModel();
            $obj->editCentro($id, $nombre, $idRegional, $idCoordinador);
        }
        $this->redirectTo("centro/view");
    }

    public function delete($id){
        $obj = new centroModel();
        $obj->deleteCentro($id);
        $this->redirectTo("centro/view");
    }
}