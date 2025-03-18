<?php
namespace App\Models;
use PDO;
use PDOException;

require_once MAIN_APP_ROUTE."../models/BaseModel.php";

class CompetenciaModel extends BaseModel{
    public function __construct(
        ?int $id = null,
        ?string $nombre = null,
        ?string $descripcion = null,
        ?string $horaInicio = null,
        ?string $horaFin = null,
        ?string $fkIdInstructor = null,
        ?string $fkIdFicha = null,
    )
    {
        $this->table = "competencia";
        //Se llama a el contructor de el padre
        parent::__construct();
    }

    public function saveCompetencia($nombre, $descipcion, $horaInicio, $horaFin, $fkIdInstructor,  $fkIdFicha){
        try {
            $sql = "INSERT INTO $this->table (nombre, descripcion, horaInicio, horaFin, fkIdInstructor, fkIdFicha) VALUES (:nombre, :descripcion, :horaInicio, :horaFin, :fkIdInstructor, :fkIdFicha)";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $statement->bindParam(":descripcion", $descipcion, PDO::PARAM_STR);
            $statement->bindParam(":horaInicio", $horaInicio, PDO::PARAM_STR);
            $statement->bindParam(":horaFin", $horaFin, PDO::PARAM_STR);
            $statement->bindParam(":fkIdInstructor", $fkIdInstructor, PDO::PARAM_INT);
            $statement->bindParam(":fkIdFicha", $fkIdFicha, PDO::PARAM_INT);
            $statement->execute();
        } catch (PDOException $ex) {
            echo "Error al guardar la competencia: ".$ex->getMessage();
        }
    }

    public function getCompetencia($id){
        try {
            $sql = "SELECT c.*,
                i.nombre AS nombreInstructor, f.ficha AS numeroFicha
                FROM competencia c
                INNER JOIN instructor i ON c.fkIdInstructor = i.id
                INNER JOIN ficha f ON c.fkIdFicha = f.id
                WHERE c.id = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            return $result[0];
        } catch (PDOException $ex) {
            echo "Error al obtener la competencia: ".$ex->getMessage();
        }
    }

    public function editCompetencia($id, $nombre, $descripcion, $horaInicio, $horaFin, $fkIdInstructor, $fkIdFicha){
        try {
            $sql = "UPDATE competencia 
                SET nombre = :nombre, descripcion = :descripcion, horaInicio = :horaInicio, horaFin = :horaFin,  fkIdInstructor = :fkIdInstructor, fkIdFicha = :fkIdFicha
                WHERE id = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $statement->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
            $statement->bindParam(":horaInicio", $horaInicio, PDO::PARAM_STR);
            $statement->bindParam(":horaFin", $horaFin, PDO::PARAM_STR);
            $statement->bindParam(":fkIdInstructor", $fkIdInstructor, PDO::PARAM_INT);
            $statement->bindParam(":fkIdFicha", $fkIdFicha, PDO::PARAM_INT);
            $result = $statement->execute();
            return $result;
        } catch (PDOException $ex) {
            echo "No se pudo editar la ficha".$ex;
        }
    }

    public function deleteCompetencia($id){
        try {
            $sql = "DELETE FROM {$this->table} WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
        } catch (PDOException $ex) {
            echo "No se pudo eliminar la competencia";
        }
    }

    public function getAllInstructor($id){
        try {
            $sql = "SELECT * FROM $this->table WHERE fkIdInstructor=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $ex) {
            echo "No se pudo obtener las competencias: ".$ex;
        }
    }
}