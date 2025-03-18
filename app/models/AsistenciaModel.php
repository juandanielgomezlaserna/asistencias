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

    public function saveAsistencia($fecha, $fkIdCompetencia,  $fkIdAprendiz, $cantHoras){
        try {
            $sql = "INSERT INTO $this->table (fecha, fkIdCompetencia, fkIdAprendiz, cantHoras) VALUES (:fecha, :fkIdCompetencia, :fkIdAprendiz, :cantHoras)";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":fecha", $fecha, PDO::PARAM_STR);
            $statement->bindParam(":fkIdCompetencia", $fkIdCompetencia, PDO::PARAM_INT);
            $statement->bindParam(":fkIdAprendiz", $fkIdAprendiz, PDO::PARAM_INT);
            $statement->bindParam(":cantHoras", $cantHoras, PDO::PARAM_INT);
            $statement->execute();
        } catch (PDOException $ex) {
            echo "Error al guardar la asistencia: ".$ex;
        }
    }

    public function getAsistencia($id){
        try {
            $sql = "SELECT a.* FROM asistencia a WHERE a.id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            return $result[0];
        } catch (PDOException $ex) {
            echo "Error al obtener la asistencia: ".$ex->getMessage();
        }
    }

    public function exist($fecha, $id){
        try {
            $sql = "SELECT * FROM $this->table WHERE fecha=:fecha && fkIdCompetencia=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->bindParam(":fecha", $fecha);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            return count($result) > 0;
        } catch (PDOException $ex) {
            echo "Error al obtener la asistencia: ".$ex;
        }
    }

    public function getAsistencias($id){
        try {
            $sql = "SELECT a.*, c.nombre AS nombreCompetencia
            FROM asistencia a
            INNER JOIN competencia c ON a.fkIdCompetencia = c.id
            INNER JOIN instructor i ON c.fkIdInstructor = i.id
            WHERE i.id = :id
            GROUP BY a.fecha, a.fkIdCompetencia
            ORDER BY a.fecha DESC";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (PDOException $ex) {
            echo "Error al obtener la asistencia: ".$ex->getMessage();
        }
    }

    public function getAsistenciasEdit($fecha, $id){
        try {
            $sql = "SELECT a.*, ap.id AS idAprendiz,
            ap.nombre AS nombreAprendiz
            FROM asistencia a
            INNER JOIN aprendiz ap
            ON a.fkIdAprendiz = ap.id
            WHERE a.fkIdCompetencia = :id && a.fecha = :fecha";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->bindParam(":fecha", $fecha);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (PDOException $ex) {
            echo "Error al obtener la asistencia: ".$ex->getMessage();
        }
    }

    public function getInfo($id){
        try {
            $sql = "SELECT p.nombre AS nombrePrograma, 
            f.ficha AS numeroFicha, c.nombre AS nombreCompetencia,
            c.horaInicio AS horaInicio,
            c.horaFin AS horaFin,
            c.descripcion AS descripcion
            FROM competencia c
            INNER JOIN ficha f ON c.fkIdFicha = f.id
            INNER JOIN programa p ON f.fkIdPrograma = p.id
            WHERE c.id = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            return $result[0];
        } catch (PDOException $ex) {
            echo "Error al obtener la asistencia: ".$ex->getMessage();
        }
    }

    public function getReportes($id){
        try {
            $sql = "SELECT a.*, SUM(a.cantHoras) AS cantidadHoras,
            MAX(a.fecha) AS ultimaFecha,
            f.ficha AS numeroFicha, p.nombre AS nombrePrograma,
            ap.nombre AS nombreAprendiz
            FROM asistencia a
            INNER JOIN aprendiz ap ON a.fkIdAprendiz=ap.id
            INNER JOIN competencia c ON a.fkIdCompetencia = c.id
            INNER JOIN ficha f ON ap.fkIdFicha = f.id
            INNER JOIN programa p ON f.fkIdPrograma = p.id
            WHERE a.cantHoras > 0 AND not a.cantHoras = -1 AND c.fkIdInstructor = :id
            GROUP BY a.fkIdAprendiz";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (PDOException $ex) {
            echo "Error al obtener la asistencia: ".$ex->getMessage();
        }
    }

    public function editAsistencia($id, $fecha, $fkIdCompetencia, $fkIdAprendiz, $cantHoras){
        try {
            $sql = "UPDATE asistencia 
                SET fecha = :fecha,  fkIdCompetencia = :fkIdCompetencia, fkIdAprendiz = :fkIdAprendiz, cantHoras=:cantHoras
                WHERE id = :id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->bindParam(":fecha", $fecha, PDO::PARAM_STR);
            $statement->bindParam(":fkIdCompetencia", $fkIdCompetencia, PDO::PARAM_INT);
            $statement->bindParam(":fkIdAprendiz", $fkIdAprendiz, PDO::PARAM_INT);
            $statement->bindParam(":cantHoras", $cantHoras, PDO::PARAM_INT);
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