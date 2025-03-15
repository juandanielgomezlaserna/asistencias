<?php
namespace App\Models;
use PDO;
use PDOException;

require_once MAIN_APP_ROUTE."../models/BaseModel.php";

class AsistenciaModel extends BaseModel{
    public function __construct(
        ?int $id = null,
        ?string $fecha = null,
        ?string $fkIdCompetencia = null,
        ?string $fkIdAprendiz = null,
    )
    {
        $this->table = "asistencia";
        //Se llama a el contructor de el padre
        parent::__construct();
    }

    public function saveAsistencia($fecha, $fkIdCompetencia,  $fkIdAprendiz){
        try {
            $sql = "INSERT INTO $this->table (fecha, fkIdCompetencia, fkIdAprendiz) VALUES (:fecha, :fkIdFicha, :fkIdAprendiz)";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":fecha", $fecha, PDO::PARAM_STR);
            $statement->bindParam(":fkIdCompetencia", $fkIdCompetencia, PDO::PARAM_INT);
            $statement->bindParam(":fkIdAprendiz", $fkIdAprendiz, PDO::PARAM_INT);
            $statement->execute();
        } catch (PDOException $ex) {
            echo "Error al guardar la asistencia: ".$ex->getMessage();
        }
    }

    public function getAsistencia($id){
        try {
            $sql = "SELECT a.id, a.fecha, 
                apr.nombre AS nombreAprendiz, apr.cedula AS cedulaAprendiz,
                c.nombre AS nombreCompetencia
                FROM asistencia a
                INNER JOIN aprendiz apr ON a.fkIdAprendiz = apr.id
                INNER JOIN competencia c ON a.fkIdCompetencia = c.id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            return $result[0];
        } catch (PDOException $ex) {
            echo "Error al obtener la asistencia: ".$ex->getMessage();
        }
    }

    public function editAsistencia($id, $fecha, $fkIdCompetencia, $fkIdAprendiz){
        try {
            $sql = "UPDATE asistencia 
                SET fecha = :fecha,  fkIdCompetencia = :fkIdCompetencia, fkIdAprendiz = :fkIdAprendiz
                WHERE id = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->bindParam(":fecha", $fecha, PDO::PARAM_STR);
            $statement->bindParam(":fkIdCompetencia", $fkIdCompetencia, PDO::PARAM_INT);
            $statement->bindParam(":fkIdAprendiz", $fkIdAprendiz, PDO::PARAM_INT);
            $result = $statement->execute();
            return $result;
        } catch (PDOException $ex) {
            echo "No se pudo editar la asistencia";
        }
    }

    public function deleteAsistencia($id){
        try {
            $sql = "DELETE FROM {$this->table} WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
        } catch (PDOException $ex) {
            echo "No se pudo eliminar la asistencia";
        }
    }
}