<?php
require_once("conexion.php");
class  CRUD extends Conexion {
    
    private $pdo;
    public function __construct(
        public string $table
    ){
        parent::__construct();
        $this->pdo = $this->conexion();

    }

    public function getAll(){
        try {
            $stm= $this->pdo->prepare("SELECT * FROM $this->table");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function getOne(int $id){
        try {
            $stm= $this->pdo->prepare("SELECT * FROM $this->table WHERE id=?");
            $stm->execute([$id]);
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function delete(int $id){
        try {
            $stm= $this->pdo->prepare("DELETE  FROM $this->table WHERE id=?");
            $stm->execute([$id]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function create(string $columnas,string $marcadores, array $datos){
        $stm = $this->pdo->prepare("INSERT INTO $this->table ($columnas) VALUES ($marcadores)");
        $stm ->execute($datos);
    }
    public function update(string $columnas, array $datos){
        $stm = $this->pdo->prepare("UPDATE  $this->table SET $columnas WHERE id=?");
        $stm ->execute($datos);
    }


}