<?php
namespace App\Models;
use PDO;
use PDOException;

require_once MAIN_APP_ROUTE."../models/BaseModel.php";

class GrupoModel extends BaseModel{
    public function __construct(
        ?int $id = null,
        ?string $ficha = null,
        ?string $cantAprendices = null,
        ?string $estado = null,
        ?string $fechaIniLectiva = null,
        ?string $fechaFinLectiva = null,
        ?string $fkIdProgForm = null,
    )
    {
        $this->table = "grupo";
        //Se llama a el contructor de el padre
        parent::__construct();
    }

    public function saveGrupo($ficha, $cantAprendices, $estado, $fechaIniLectiva, $fechaFinLectiva, $fkIdProgForm){
        try {
            $sql = "INSERT INTO $this->table (ficha, cantAprendices, estado, fechaIniLectiva, fechaFinLectiva, fkIdProgForm) VALUES (:ficha, :cantAprendices, :estado, :fechaIniLectiva, :fechaFinLectiva, :fkIdProgForm)";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":ficha", $ficha, PDO::PARAM_STR);
            $statement->bindParam(":cantAprendices", $cantAprendices, PDO::PARAM_STR);
            $statement->bindParam(":estado", $estado, PDO::PARAM_STR);
            $statement->bindParam(":fechaIniLectiva", $fechaIniLectiva, PDO::PARAM_STR);
            $statement->bindParam(":fechaFinLectiva", $fechaFinLectiva, PDO::PARAM_STR);
            $statement->bindParam(":fkIdProgForm", $fkIdProgForm, PDO::PARAM_INT);
            $statement->execute();
        } catch (PDOException $ex) {
            echo "Error al guardar el grupo: ".$ex->getMessage();
        }
    }

    public function getGrupo($id){
        try {
            $sql = "SELECT g.*, p.nombre AS programaNombre
            FROM grupo g
            INNER JOIN programaformacion p
            ON g.fkIdProgForm = p.id
            WHERE g.id = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            return $result[0];
        } catch (PDOException $ex) {
            echo "Error al obtener grupo: ".$ex->getMessage();
        }
    }

    public function editGrupo($id, $ficha, $cantAprendices, $estado, $fechaIniLectiva, $fechaFinLectiva, $fkIdProgForm){
        try {
            $sql = "UPDATE {$this->table} SET ficha=:ficha, cantAprendices=:cantAprendices, estado=:estado, fechaIniLectiva=:fechaIniLectiva, fechaFinLectiva=:fechaFinLectiva, fkIdProgForm=:fkIdProgForm WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->bindParam(":ficha", $ficha, PDO::PARAM_STR);
            $statement->bindParam(":cantAprendices", $cantAprendices, PDO::PARAM_STR);
            $statement->bindParam(":estado", $estado, PDO::PARAM_STR);
            $statement->bindParam(":fechaIniLectiva", $fechaIniLectiva, PDO::PARAM_STR);
            $statement->bindParam(":fechaFinLectiva", $fechaFinLectiva, PDO::PARAM_STR);
            $statement->bindParam(":fkIdProgForm", $fkIdProgForm, PDO::PARAM_INT);
            $result = $statement->execute();
            return $result;
        } catch (PDOException $ex) {
            echo "No se pudo editar el grupo";
        }
    }

    public function deleteGrupo($id){
        try {
            $sql = "DELETE FROM {$this->table} WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
        } catch (PDOException $ex) {
            echo "No se pudo eliminar el grupo";
        }
    }
}