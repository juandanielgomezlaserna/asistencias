<?php
namespace App\Models;
use PDO;
use PDOException;

require_once MAIN_APP_ROUTE."../models/BaseModel.php";

class ProgramaModel extends BaseModel{
    public function __construct(
        ?int $id = null,
        ?string $nombre = null,
        ?string $fkIdCentro = null,
    )
    {
        $this->table = "programa";
        //Se llama a el contructor de el padre
        parent::__construct();
    }

    public function savePrograma($nombre, $fkIdCentro){
        try {
            $sql = "INSERT INTO $this->table (nombre, fkIdCentro) VALUES (:nombre, :fkIdCentro)";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $statement->bindParam(":fkIdCentro", $fkIdCentro, PDO::PARAM_INT);
            $statement->execute();
        } catch (PDOException $ex) {
            echo "Error al guardar programa: ".$ex->getMessage();
        }
    }

    public function getPrograma($id){
        try {
            $sql = "SELECT p.*, c.nombre AS nombreCentro
                FROM programa p
                INNER JOIN centro c ON p.fkIdCentro = c.id
                WHERE p.id = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            return $result[0];
        } catch (PDOException $ex) {
            echo "Error al obtener el programa: ".$ex->getMessage();
        }
    }

    public function editPrograma($id, $nombre,  $fkIdCentro){
        try {
            $sql = "UPDATE programa 
                SET nombre = :nombre, fkIdCentro = :fkIdCentro
                WHERE id = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $statement->bindParam(":fkIdCentro", $fkIdCentro, PDO::PARAM_INT);
            $result = $statement->execute();
            return $result;
        } catch (PDOException $ex) {
            echo "No se pudo editar el programa";
        }
    }

    public function deletePrograma($id){
        try {
            $sql = "DELETE FROM {$this->table} WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
        } catch (PDOException $ex) {
            echo "No se pudo eliminar el programa";
        }
    }

    public function getAllCentros($id){
        try {
            $sql = "SELECT * FROM $this->table WHERE fkIdCentro=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $ex) {
            echo "No se pudo obtener los programas: ".$ex;
        }
    }

    public function getProgramasCoordinador($id){
        try {
            $sql = "SELECT p.* FROM $this->table p
            INNER JOIN centro c ON p.fkIdCentro = c.id
            WHERE c.fkIdCoordinador = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $ex) {
            echo "No se pudo obtener los programas: ".$ex;
        }
    }
}