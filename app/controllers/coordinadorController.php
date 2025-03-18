<?php
namespace App\Controllers;

use App\Models\AdministradorModel;
use App\Models\CoordinadorModel;
use App\Models\RegionalModel;

require_once "baseController.php";
require_once MAIN_APP_ROUTE."../models/AdministradorModel.php";
require_once MAIN_APP_ROUTE."../models/RegionalModel.php";
require_once MAIN_APP_ROUTE."../models/CoordinadorModel.php";

class CoordinadorController extends BaseController{
    public function __construct(){
        //Se define la plantilla para este controlador
        $this->layout = "admin_layout";
    }

    public function index(){
        $obj = new CoordinadorModel();
        $info = $obj->getCoordinador($_SESSION["coordinador"]);
        $data = [
            "titulo" => "Coordinador interfaz",
            "coordinador" => $info
        ];
        $this->render("coordinador/index.php", $data);
    }

    public function view(){
        $obj = new CoordinadorModel();
        $items = $obj->getAll();
        $data = [
            "coordinadores"=>$items,
            "titulo" => "Lista de coordinadores"
        ];
        $this->render('coordinador/view.php', $data);
    }

    public function new(){
        $administradorObj = new AdministradorModel();
        $regionalId = $administradorObj->getAdministrador($_SESSION["administrador"])->fkIdRegional;

        $data = [
            "regionalId" => $regionalId,
            "titulo" => "Nuevo coordinador"
        ];

        $this->render('coordinador/new.php', $data);
    }

    public function create(){
        if (isset($_POST["nombre"])) {
            $nombre = $_POST["nombre"] ?? null;
            $cedula = $_POST["cedula"] ?? null;
            $idRegional = $_POST["idRegional"] ?? null;
            $obj = new CoordinadorModel();
            $obj->saveCoordinador($nombre, $cedula, $idRegional);
            $this->redirectTo("coordinador/view");
        }
    }

    public function viewOne($id){
        $obj = new CoordinadorModel();
        $info = $obj->getCoordinador($id);
        $data = [
            "coordinador" => $info,
            "titulo" => "Ver coordinador ".$info->nombre
        ];
        $this->render("coordinador/viewOne.php", $data);
    }

    public function edit($id){
        $administradorObj = new AdministradorModel();
        $regionalId = $administradorObj->getAdministrador($_SESSION["administrador"])->fkIdRegional;
        $obj = new CoordinadorModel();
        $info = $obj->getCoordinador($id);
        $data = [
            "coordinador" => $info,
            "titulo" => "Editar coordinador",
            "regionalId" => $regionalId
        ];
        $this->render("coordinador/edit.php", $data);
    }

    public function update(){
        if (isset($_POST["id"])) {
            $id = $_POST["id"] ?? null;
            $id = (int)$id;
            $nombre = $_POST["nombre"] ?? null;
            $cedula = $_POST["cedula"] ?? null;
            $idRegional = $_POST["idRegional"] ?? null;
            $idRegional = (int)$idRegional;
            $obj = new CoordinadorModel();
            $obj->editCoordinador($id, $nombre, $cedula, $idRegional);
        }
        $this->redirectTo("coordinador/view");
    }

    public function delete($id){
        $obj = new CoordinadorModel();
        $obj->deleteCoordinador($id);
        $this->redirectTo("coordinador/view");
    }
}