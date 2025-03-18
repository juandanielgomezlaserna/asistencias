<?php
namespace App\Controllers;

use App\Models\CentroModel;
use App\Models\CoordinadorModel;
use App\Models\AmbienteModel;

require_once "baseController.php";
require_once MAIN_APP_ROUTE."../models/AmbienteModel.php";
require_once MAIN_APP_ROUTE."../models/CentroModel.php";
require_once MAIN_APP_ROUTE."../models/CoordinadorModel.php";

class AmbienteController extends BaseController{
    public function __construct(){
        //Se define la plantilla para este controlador
        $this->layout = "admin_layout";
    }

    public function view(){
        $obj = new AmbienteModel();
        $items = $obj->getAll();
        $data = [
            "ambientes"=>$items,
            "titulo" => "Lista de ambientes"
        ];
        $this->render('ambiente/view.php', $data);
    }

    public function new(){
        $centroObj = new CentroModel();
        $idCentro = $centroObj->getCentroCoordinador($_SESSION["coordinador"]);

        $data = [
            "idCentro" => $idCentro,
            "titulo" => "Nuevo ambiente"
        ];

        $this->render('ambiente/new.php', $data);
    }

    public function create(){
        if (isset($_POST["nombre"])) {
            $nombre = $_POST["nombre"] ?? null;
            $idCentro = $_POST["idCentro"] ?? null;
            $obj = new AmbienteModel();
            $obj->saveAmbiente($nombre, $idCentro);
            $this->redirectTo("ambiente/view");
        }
    }

    public function viewOne($id){
        $obj = new AmbienteModel();
        $info = $obj->getAmbiente($id);
        $data = [
            "ambiente" => $info,
            "titulo" => "Ver ambiente ".$info->nombre
        ];
        $this->render("ambiente/viewOne.php", $data);
    }

    public function edit($id){
        $obj = new AmbienteModel();
        $info = $obj->getAmbiente($id);
        $centroObj = new CentroModel();
        $idCentro = $centroObj->getCentroCoordinador($_SESSION["coordinador"]);
        $data = [
            "ambiente" => $info,
            "titulo" => "Editar ambiente",
            "idCentro" => $idCentro
        ];
        $this->render("ambiente/edit.php", $data);
    }

    public function update(){
        if (isset($_POST["id"])) {
            $id = $_POST["id"] ?? null;
            $nombre = $_POST["nombre"] ?? null;
            $idCentro = $_POST["idCentro"] ?? null;
            $obj = new AmbienteModel();
            $obj->editAmbiente($id, $nombre, $idCentro);
        }
        $this->redirectTo("ambiente/view");
    }

    public function delete($id){
        $obj = new AmbienteModel();
        $obj->deleteAmbiente($id);
        $this->redirectTo("ambiente/view");
    }
}