<?php
namespace App\Models;
use PDO;
use PDOException;

require_once MAIN_APP_ROUTE."../models/BaseModel.php";

class AprendizModel extends BaseModel{
    public function __construct(
        ?int $id = null,
        ?string $nombre = null,
        ?string $cedula = null,
        ?string $estado = null,
        ?string $fkIdFicha = null,
    )
    {
        $this->table = "aprendiz";
        //Se llama a el contructor de el padre
        parent::__construct();
    }

    public function saveAprendiz($nombre, $cedula, $estado, $fkIdFicha){
        try {
            $sql = "INSERT INTO $this->table (nombre, cedula, estado, fkIdFicha) VALUES (:nombre, :cedula, :estado, :fkIdFicha)";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $statement->bindParam(":cedula", $cedula, PDO::PARAM_INT);
            $statement->bindParam(":estado", $estado, PDO::PARAM_STR);
            $statement->bindParam(":fkIdFicha", $fkIdFicha, PDO::PARAM_INT);
            $statement->execute();
        } catch (PDOException $ex) {
            echo "Error al guardar el Aprediz: ".$ex->getMessage();
        }
    }

    public function getAprendiz($id){
        try {
            $sql = "SELECT a.*, f.ficha AS numeroFicha,
                p.nombre AS nombrePrograma
                FROM aprendiz a
                INNER JOIN ficha f ON a.fkIdFicha = f.id
                INNER JOIN programa p ON f.fkIdPrograma = p.id
                WHERE a.id = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            return $result[0];
        } catch (PDOException $ex) {
            echo "Error al obtener el aprendiz: ".$ex->getMessage();
        }
    }

    public function getAprendices($id){
        try {
            $sql = "SELECT a.*, f.ficha AS numeroFicha
            FROM aprendiz a
            INNER JOIN ficha f ON a.fkIdFicha = f.id
            INNER JOIN programa p ON f.fkIdPrograma = p.id
            INNER JOIN centro c ON p.fkIdCentro = c.id
            INNER JOIN coordinador co ON c.fkIdCoordinador = co.id
            WHERE co.id = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (PDOException $ex) {
            echo "Error al obtener el aprendiz: ".$ex->getMessage();
        }
    }

    public function getAllCompetencia($id){
        try {
            $sql = "SELECT a.*
            FROM competencia c
            INNER JOIN ficha f ON c.fkIdFicha = f.id
            INNER JOIN aprendiz a ON a.fkIdficha = f.id
            WHERE c.id = :id
            ORDER BY LOWER(a.nombre) ASC";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (PDOException $ex) {
            echo "Error al obtener los aprendices: ".$ex->getMessage();
        }
    }

    public function editAprendiz($id, $nombre, $cedula, $estado, $fkIdFicha){
        try {
            $sql = "UPDATE aprendiz 
                SET nombre = :nombre, cedula = :cedula, estado = :estado,  fkIdFicha = :fkIdFicha 
                WHERE id = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $statement->bindParam(":cedula", $cedula, PDO::PARAM_INT);
            $statement->bindParam(":estado", $estado, PDO::PARAM_STR);
            $statement->bindParam(":fkIdFicha", $fkIdFicha, PDO::PARAM_INT);
            $result = $statement->execute();
            return $result;
        } catch (PDOException $ex) {
            echo "No se pudo editar el APRENDIZ";
        }
    }

    public function deleteAprendiz($id){
        try {
            $sql = "DELETE FROM {$this->table} WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
        } catch (PDOException $ex) {
            echo "No se pudo eliminar el aprendiz";
        }
    }
}