<?php
namespace App\Controllers;

use App\Models\AprendizModel;
use App\Models\FichaModel;

require_once "baseController.php";
require_once MAIN_APP_ROUTE."../models/AprendizModel.php";
require_once MAIN_APP_ROUTE."../models/FichaModel.php";

class AprendizController extends BaseController{
    public function __construct(){
        $this->layout = "admin_layout";
    }

    public function view(){
        $obj = new AprendizModel();
        $items = $obj->getAprendices($_SESSION["coordinador"]);
        $data = [
            "aprendices"=>$items,
            "titulo" => "Lista de aprendices"
        ];
        $this->render('aprendiz/view.php', $data);
    }

    public function new(){
        $fichaObj = new FichaModel();
        $fichas = $fichaObj->getFichasCoordinador($_SESSION["coordinador"]);

        $data = [
            "fichas" => $fichas,
            "titulo" => "Nuevo aprendiz"
        ];

        $this->render('aprendiz/new.php', $data);
    }

    public function create(){
        if (isset($_POST["nombre"])) {
            $nombre = $_POST["nombre"] ?? null;
            $cedula = $_POST["cedula"] ?? null;
            $idFicha = $_POST["idFicha"] ?? null;
            $estado = $_POST["estado"] ?? null;
            $obj = new AprendizModel();
            $obj->saveAprendiz($nombre, $cedula, $estado, $idFicha);
            $this->redirectTo("aprendiz/view");
        }
    }

    public function viewOne($id){
        $obj = new AprendizModel();
        $info = $obj->getAprendiz($id);
        $data = [
            "aprendiz" => $info,
            "titulo" => "Ver aprendiz ".$info->nombre
        ];
        $this->render("aprendiz/viewOne.php", $data);
    }

    public function edit($id){
        $obj = new AprendizModel();
        $info = $obj->getAprendiz($id);
        $fichaObj = new FichaModel();
        $fichas = $fichaObj->getFichasCoordinador($_SESSION["coordinador"]);
        $data = [
            "aprendiz" => $info,
            "titulo" => "Editar aprendiz",
            "fichas" => $fichas
        ];
        $this->render("aprendiz/edit.php", $data);
    }

    public function update(){
        if (isset($_POST["id"])) {
            $id = $_POST["id"] ?? null;
            $nombre = $_POST["nombre"] ?? null;
            $cedula = $_POST["cedula"] ?? null;
            $idFicha = $_POST["idFicha"] ?? null;
            $estado = $_POST["estado"] ?? null;
            $obj = new AprendizModel();
            $obj->editAprendiz($id, $nombre, $cedula, $estado, $idFicha);
        }
        $this->redirectTo("aprendiz/view");
    }

    public function delete($id){
        $obj = new AprendizModel();
        $obj->deleteAprendiz($id);
        $this->redirectTo("aprendiz/view");
    }
}