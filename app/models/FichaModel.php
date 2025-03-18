<?php
namespace App\Models;
use PDO;
use PDOException;

require_once MAIN_APP_ROUTE."../models/BaseModel.php";

class FichaModel extends BaseModel{
    public function __construct(
        ?int $id = null,
        ?string $ficha = null,
        ?string $cantAprendices = null,
        ?string $fkIdPrograma = null,
    )
    {
        $this->table = "ficha";
        //Se llama a el contructor de el padre
        parent::__construct();
    }

    public function saveFicha($ficha, $cantAprendices, $fkIdPrograma){
        try {
            $sql = "INSERT INTO $this->table (ficha, cantAprendices, fkIdPrograma) VALUES (:ficha, :cantAprendices, :fkIdPrograma)";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":ficha", $ficha, PDO::PARAM_INT);
            $statement->bindParam(":cantAprendices", $cantAprendices, PDO::PARAM_INT);
            $statement->bindParam(":fkIdPrograma", $fkIdPrograma, PDO::PARAM_INT);
            $statement->execute();
        } catch (PDOException $ex) {
            echo "Error al guardar la ficha: ".$ex->getMessage();
        }
    }

    public function getFicha($id){
        try {
            $sql = "SELECT f.*, p.nombre AS nombrePrograma
                FROM ficha f
                INNER JOIN programa p ON f.fkIdPrograma = p.id
                WHERE f.id = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            return $result[0];
        } catch (PDOException $ex) {
            echo "Error al obtener la ficha: ".$ex->getMessage();
        }
    }

    public function getFichaInstructor($id){
        try {
            $sql = "SELECT f.*, p.nombre AS nombrePrograma
            FROM $this->table f 
            INNER JOIN programa p ON f.fkIdPrograma = p.id
            INNER JOIN centro c ON p.fkIdCentro = c.id
            WHERE c.id = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (PDOException $ex) {
            echo "Error al obtener la ficha: ".$ex->getMessage();
        }
    }

    public function getFichasCoordinador($id){
        try {
            $sql = "SELECT f.*, p.nombre AS nombrePrograma
            FROM $this->table f 
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
            echo "Error al obtener la ficha: ".$ex->getMessage();
        }
    }

    public function editFicha($id, $ficha, $cantAprendices,  $fkIdPrograma){
        try {
            $sql = "UPDATE ficha 
                SET ficha = :ficha, cantAprendices = :cantAprendices, fkIdPrograma = :fkIdPrograma
                WHERE id = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->bindParam(":ficha", $ficha, PDO::PARAM_INT);
            $statement->bindParam(":cantAprendices", $cantAprendices, PDO::PARAM_INT);
            $statement->bindParam(":fkIdPrograma", $fkIdPrograma, PDO::PARAM_INT);
            $result = $statement->execute();
            return $result;
        } catch (PDOException $ex) {
            echo "No se pudo editar la ficha".$ex;
        }
    }

    public function deleteFicha($id){
        try {
            $sql = "DELETE FROM {$this->table} WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
        } catch (PDOException $ex) {
            echo "No se pudo eliminar la Ficha".$ex;
        }
    }
}