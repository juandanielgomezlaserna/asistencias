<?php
namespace App\Models;
use PDO;
use PDOException;

require_once MAIN_APP_ROUTE."../models/BaseModel.php";

class InstructorModel extends BaseModel{
    public function __construct(
        ?int $id = null,
        ?string $nombre = null,
        ?string $cedula = null,
        ?string $fkIdCentro = null,
    )
    {
        $this->table = "instructor";
        //Se llama a el contructor de el padre
        parent::__construct();
    }

    public function saveInstructor($nombre, $cedula, $fkIdCentro){
        try {
            $sql = "INSERT INTO $this->table (nombre, cedula, fkIdCentro) VALUES (:nombre, :cedula, :fkIdCentro)";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $statement->bindParam(":cedula", $cedula, PDO::PARAM_INT);
            $statement->bindParam(":fkIdCentro", $fkIdCentro, PDO::PARAM_INT);
            $statement->execute();
        } catch (PDOException $ex) {
            echo "Error al guardar el instructor: ".$ex->getMessage();
        }
    }

    public function getInstructor($id){
        try {
            $sql = "SELECT i.*, 
                       c.nombre AS nombreCentro
                FROM instructor i
                INNER JOIN centro c ON i.fkIdCentro = c.id
                WHERE i.id = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            return $result[0];
        } catch (PDOException $ex) {
            echo "Error al obtener el instructor: ".$ex->getMessage();
        }
    }

    public function getCentro($id){
        try {
            $sql = "SELECT fkIdCentro FROM $this->table WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchColumn();
            return $result;
        } catch (PDOException $ex) {
            echo "Error al obtener el instructor: ".$ex->getMessage();
        }
    }

    public function editInstructor($id, $nombre, $cedula,  $fkIdCentro){
        try {
            $sql = "UPDATE instructor 
                SET nombre = :nombre, cedula = :cedula, fkIdCentro = :fkIdCentro
                WHERE id = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $statement->bindParam(":cedula", $cedula, PDO::PARAM_INT);
            $statement->bindParam(":fkIdCentro", $fkIdCentro, PDO::PARAM_INT);
            $result = $statement->execute();
            return $result;
        } catch (PDOException $ex) {
            echo "No se pudo editar el instructor";
        }
    }

    public function deleteInstructor($id){
        try {
            $sql = "DELETE FROM {$this->table} WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
        } catch (PDOException $ex) {
            echo "No se pudo eliminar el instructor";
        }
    }

    public function validarLogin($id, $cedula){
        $sql = "SELECT * FROM $this->table WHERE id=:id and cedula=:cedula";
        $statement = $this->dbConnection->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->bindParam(":cedula", $cedula);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_OBJ);
        if (count($result) > 0) {
            $_SESSION["instructor"] = $result[0]->id;
            return true;
        }
        return false;
    }
}