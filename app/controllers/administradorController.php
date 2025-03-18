<?php
namespace App\Controllers;

use App\Models\AdministradorModel;
use App\Models\RegionalModel;

require_once "baseController.php";
require_once MAIN_APP_ROUTE."../models/AdministradorModel.php";
require_once MAIN_APP_ROUTE."../models/RegionalModel.php";

class AdministradorController extends BaseController{
    public function __construct(){
        //Se define la plantilla para este controlador
        $this->layout = "admin_layout";
    }
    public function index(){
        $obj = new AdministradorModel();
        $info = $obj->getAdministrador($_SESSION["administrador"]);
        $data = [
            "titulo" => "Administrador interfaz",
            "administrador" => $info
        ];
        $this->render("administrador/index.php", $data);
    }

    public function view(){
        $obj = new AdministradorModel();
        $items = $obj->getAll();
        $data = [
            "administradores"=>$items,
            "titulo" => "Lista de administradores"
        ];
        $this->render('administrador/view.php', $data);
    }

    public function new(){
        $obj = new RegionalModel();
        $items = $obj->getAll();

        $data = [
            "regionales" => $items,
            "titulo" => "Nuevo administrador"
        ];

        $this->render('administrador/new.php', $data);
    }

    public function create(){
        if (isset($_POST["nombre"])) {
            $nombre = $_POST["nombre"] ?? null;
            $cedula = $_POST["cedula"] ?? null;
            $idRegional = $_POST["idRegional"] ?? null;
            $obj = new AdministradorModel();
            $obj->saveAdministrador($nombre, $cedula, $idRegional);
            $this->redirectTo("administrador/view");
        }
    }

    public function viewOne($id){
        $obj = new AdministradorModel();
        $info = $obj->getAdministrador($id);
        $data = [
            "administrador" => $info,
            "titulo" => "Ver administrador ".$info->nombre
        ];
        $this->render("administrador/viewOne.php", $data);
    }

    public function edit($id){
        $obj = new AdministradorModel();
        $info = $obj->getAdministrador($id);
        $regionalObj = new RegionalModel();
        $regionales = $regionalObj->getAll();
        $data = [
            "administrador" => $info,
            "titulo" => "Editar administrador",
            "regionales" => $regionales
        ];
        $this->render("administrador/edit.php", $data);
    }

    public function update(){
        if (isset($_POST["id"])) {
            $id = $_POST["id"] ?? null;
            $id = (int)$id;
            $nombre = $_POST["nombre"] ?? null;
            $cedula = $_POST["cedula"] ?? null;
            $idRegional = $_POST["idRegional"] ?? null;
            $idRegional = (int)$idRegional;
            $obj = new AdministradorModel();
            $obj->editAdministrador($id, $nombre, $cedula, $idRegional);
        }
        $this->redirectTo("administrador/view");
    }

    public function delete($id){
        $obj = new AdministradorModel();
        $obj->deleteAdministrador($id);
        $this->redirectTo("administrador/view");
    }
}