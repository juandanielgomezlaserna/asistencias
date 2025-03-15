<?php
namespace App\Models;
use PDO;
use PDOException;

require_once MAIN_APP_ROUTE."../models/BaseModel.php";

class CoordinadorModel extends BaseModel{
    public function __construct(
        ?int $id = null,
        ?string $nombre = null,
        ?string $cedula = null,
        ?string $fkIdRegional = null,
    )
    {
        $this->table = "coordinador";
        //Se llama a el contructor de el padre
        parent::__construct();
    }

    public function saveCoordinador($nombre, $cedula, $fkIdRegional){
        try {
            $sql = "INSERT INTO $this->table (nombre, cedula, fkIdRegional) VALUES (:nombre, :cedula, :fkIdRegional)";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $statement->bindParam(":cedula", $cedula, PDO::PARAM_INT);
            $statement->bindParam(":fkIdRegional", $fkIdRegional, PDO::PARAM_INT);
            $statement->execute();
        } catch (PDOException $ex) {
            echo "Error al guardar el coordinador: ".$ex->getMessage();
        }
    }

    public function getCoordinador($id){
        try {
            $sql = "SELECT coor.id, coor.nombre AS nombreCoordinador, coor.cedula AS cedulaCoordinador, 
                       r.nombre AS nombreRegional
                FROM coordinador coor
                INNER JOIN regional r ON coor.fkIdRegional = r.id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            return $result[0];
        } catch (PDOException $ex) {
            echo "Error al obtener el coordinador: ".$ex->getMessage();
        }
    }

    public function editCompetencia($id, $nombre, $cedula,  $fkIdRegional){
        try {
            $sql = "UPDATE coordinador 
                SET nombre = :nombre, cedula = :cedula, fkIdRegional = :fkIdRegional
                WHERE id = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $statement->bindParam(":cedula", $cedula, PDO::PARAM_INT);
            $statement->bindParam(":fkIdRegional", $fkIdRegional, PDO::PARAM_INT);
            $result = $statement->execute();
            return $result;
        } catch (PDOException $ex) {
            echo "No se pudo editar el coordinador";
        }
    }

    public function deleteCoordinador($id){
        try {
            $sql = "DELETE FROM {$this->table} WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
        } catch (PDOException $ex) {
            echo "No se pudo eliminar el coordinador";
        }
    }
}