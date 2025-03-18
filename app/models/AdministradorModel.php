<?php
namespace App\Models;
use PDO;
use PDOException;

require_once MAIN_APP_ROUTE."../models/BaseModel.php";

class AdministradorModel extends BaseModel{
    public function __construct(
        ?int $id = null,
        ?string $nombre = null,
        ?string $cedula = null,
        ?string $fkIdRegional = null,
    )
    {
        $this->table = "administrador";
        //Se llama a el contructor de el padre
        parent::__construct();
    }

    public function saveAdministrador($nombre, $cedula,$fkIdRegional){
        try {
            $sql = "INSERT INTO $this->table (nombre, cedula,fkIdRegional) VALUES (:nombre, :cedula, :fkIdRegional)";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $statement->bindParam(":cedula", $cedula, PDO::PARAM_INT);
            $statement->bindParam(":fkIdRegional", $fkIdRegional, PDO::PARAM_INT);
            $statement->execute();
        } catch (PDOException $ex) {
            echo "Error al guardar el Administrador: ".$ex->getMessage();
        }
    }

    public function getAdministrador($id){
        try {
            $sql = "SELECT a.*, r.nombre AS regionalNombre 
            FROM administrador a
            INNER JOIN regional r ON a.fkIdRegional = r.id
            WHERE a.id = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            return $result[0];
        } catch (PDOException $ex) {
            echo "Error al obtener el administrador: ".$ex->getMessage();
        }
    }

    public function editAdministrador($id, $nombre, $cedula, $fkIdRegional){
        try {
            $sql = "UPDATE administrador 
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
            echo "No se pudo editar el administrador".$ex;
        }
    }

    public function deleteAdministrador($id){
        try {
            $sql = "DELETE FROM {$this->table} WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
        } catch (PDOException $ex) {
            echo "No se pudo eliminar el administrador";
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
            $_SESSION["administrador"] = $result[0]->id;
            return true;
        }
        return false;
    }
}