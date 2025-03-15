<?php
namespace App\Models;
use PDO;
use PDOException;

require_once MAIN_APP_ROUTE."../models/BaseModel.php";

class CentroModel extends BaseModel{
    public function __construct(
        ?int $id = null,
        ?string $nombre = null,
        ?string $fkIdRegional = null,
        ?string $fkIdCoordinador = null,
    )
    {
        $this->table = "centro";
        //Se llama a el contructor de el padre
        parent::__construct();
    }

    public function saveCentro($nombre, $fkIdRegional,  $fkIdCoordinador){
        try {
            $sql = "INSERT INTO $this->table (nombre, fkIdRegional, fkIdCoordinador) VALUES (:nombre, :fkIdRegional, :fkIdCoordinador)";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $statement->bindParam(":fkIdRegional", $fkIdRegional, PDO::PARAM_INT);
            $statement->bindParam(":fkIdCoordinador", $fkIdCoordinador, PDO::PARAM_INT);
            $statement->execute();
        } catch (PDOException $ex) {
            echo "Error al guardar el centro: ".$ex->getMessage();
        }
    }

    public function getCentro($id){
        try {
            $sql = "SELECT c.id, c.nombre AS nombreCentro, 
                r.nombre AS nombreRegional, 
                coor.nombre AS nombreCoordinador, coor.cedula AS cedulaCoordinador
                FROM centro c
                INNER JOIN regional r ON c.fkIdRegional = r.id
                INNER JOIN coordinador coor ON c.fkIdCoordinador = coor.id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            return $result[0];
        } catch (PDOException $ex) {
            echo "Error al obtener el centro: ".$ex->getMessage();
        }
    }

    public function editCentro($id, $nombre, $fkIdRegional, $fkIdCoordinador){
        try {
            $sql = "UPDATE centro 
                SET nombre = :nombre,  fkIdRegional = :fkIdRegional, fkIdCoordinador = :fkIdCoordinador
                WHERE id = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $statement->bindParam(":fkIdRegional", $fkIdRegional, PDO::PARAM_INT);
            $statement->bindParam(":fkIdCoordinador", $fkIdCoordinador, PDO::PARAM_INT);
            $result = $statement->execute();
            return $result;
        } catch (PDOException $ex) {
            echo "No se pudo editar el centro";
        }
    }

    public function deleteCentro($id){
        try {
            $sql = "DELETE FROM {$this->table} WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
        } catch (PDOException $ex) {
            echo "No se pudo eliminar el centro";
        }
    }
}