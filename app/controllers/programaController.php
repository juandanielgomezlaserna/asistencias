<?php
namespace App\Controllers;

use App\Models\CentroModel;
use App\Models\CoordinadorModel;
use App\Models\ProgramaModel;

require_once "baseController.php";
require_once MAIN_APP_ROUTE."../models/ProgramaModel.php";
require_once MAIN_APP_ROUTE."../models/CentroModel.php";

class programaController extends BaseController{
    public function __construct(){
        //Se define la plantilla para este controlador
        $this->layout = "admin_layout";
    }

    public function view(){
        $obj = new ProgramaModel();
        $items = $obj->getProgramasCoordinador($_SESSION["coordinador"]);
        $data = [
            "programas"=>$items,
            "titulo" => "Lista de programas"
        ];
        $this->render('programa/view.php', $data);
    }

    public function new(){
        $centroObj = new CentroModel();
        $idCentro = $centroObj->getCentroCoordinador($_SESSION["coordinador"]);

        $data = [
            "idCentro" => $idCentro,
            "titulo" => "Nuevo programa"
        ];

        $this->render('programa/new.php', $data);
    }

    public function create(){
        if (isset($_POST["nombre"])) {
            $nombre = $_POST["nombre"] ?? null;
            $idCentro = $_POST["idCentro"] ?? null;
            $obj = new ProgramaModel();
            $obj->savePrograma($nombre, $idCentro);
            $this->redirectTo("programa/view");
        }
    }

    public function viewOne($id){
        $obj = new ProgramaModel();
        $info = $obj->getPrograma($id);
        $data = [
            "programa" => $info,
            "titulo" => "Ver programa ".$info->nombre
        ];
        $this->render("programa/viewOne.php", $data);
    }

    public function edit($id){
        $obj = new ProgramaModel();
        $info = $obj->getPrograma($id);
        $centroObj = new CentroModel();
        $idCentro = $centroObj->getCentroCoordinador($_SESSION["coordinador"]);
        $data = [
            "programa" => $info,
            "titulo" => "Editar programa",
            "idCentro" => $idCentro
        ];
        $this->render("programa/edit.php", $data);
    }

    public function update(){
        if (isset($_POST["id"])) {
            $id = $_POST["id"] ?? null;
            $nombre = $_POST["nombre"] ?? null;
            $idCentro = $_POST["idCentro"] ?? null;
            $obj = new ProgramaModel();
            $obj->editPrograma($id, $nombre, $idCentro);
        }
        $this->redirectTo("programa/view");
    }

    public function delete($id){
        $obj = new ProgramaModel();
        $obj->deletePrograma($id);
        $this->redirectTo("programa/view");
    }
}