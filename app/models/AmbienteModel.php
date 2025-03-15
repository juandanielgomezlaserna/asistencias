<?php
namespace App\Models;
use PDO;
use PDOException;

require_once MAIN_APP_ROUTE."../models/BaseModel.php";

class AmbienteModel extends BaseModel{
    public function __construct(
        ?int $id = null,
        ?string $nombre = null,
        ?string $fkIdCentro = null,
    )
    {
        $this->table = "ambiente";
        //Se llama a el contructor de el padre
        parent::__construct();
    }

    public function saveAmbiente($nombre, $fkIdCentro){
        try {
            $sql = "INSERT INTO $this->table (nombre, fkIdCentro) VALUES (:nombre, :fkIdCentro)";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $statement->bindParam(":fkIdCentro", $fkIdCentro, PDO::PARAM_INT);
            $statement->execute();
        } catch (PDOException $ex) {
            echo "Error al guardar el ambiente: ".$ex->getMessage();
        }
    }

    public function getAmbiente($id){
        try {
            $sql = $sql = "SELECT a.*, c.nombre AS centroNombre 
            FROM ambiente a
            INNER JOIN centro c ON a.fkIdCentro = c.id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            return $result[0];
        } catch (PDOException $ex) {
            echo "Error al obtener el ambiente: ".$ex->getMessage();
        }
    }

    public function editAmbiente($id, $nombre, $fkIdCentro){
        try {
            $sql = "UPDATE ambiente 
                SET nombre = :nombre,  fkIdCentro = :fkIdCentro 
                WHERE id = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $statement->bindParam(":fkIdCentro", $fkIdCentro, PDO::PARAM_INT);
            $result = $statement->execute();
            return $result;
        } catch (PDOException $ex) {
            echo "No se pudo editar el ambiente";
        }
    }

    public function deleteAmbiente($id){
        try {
            $sql = "DELETE FROM {$this->table} WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
        } catch (PDOException $ex) {
            echo "No se pudo eliminar el ambiente";
        }
    }
}