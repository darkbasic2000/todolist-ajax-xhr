<?php

class Database {

    private $server = "localhost";
    private $database = "listadetarefas";
    private $user = "root";
    private $password = "";
    private $conn = null;

    function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->server;dbname=$this->database", $this->user, $this->password);
        }
        catch(PDOException $e) {
            $e->getMessage();
        }
    }

    function addTask($descricao, $prioridade, $concluida) {
        $stmt = $this->conn->prepare("INSERT INTO tarefas (descricao, prioridade, concluida)
                VALUES (:descricao, :prioridade, :concluida)");
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':prioridade', $prioridade);
        $stmt->bindParam(':concluida', $concluida);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function updateTask($id, $descricao, $prioridade, $concluida) {
        try {
            $stmt = $this->conn->prepare("UPDATE tarefas SET descricao = :descricao, prioridade = :prioridade, 
            concluida = :concluida WHERE id = :id");
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':prioridade', $prioridade);
            $stmt->bindParam(':concluida', $concluida);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return true;
        }
        catch(PDOException $e) {
            return false;
        }
    }

    function readTasks() {
        $stmt = $this->conn->prepare("SELECT * FROM tarefas");
        $stmt->execute();
        $tarefas = null;
        if($stmt->rowCount() > 0) {
            $tarefas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return $tarefas;
    }

    function getTask($id) {
        $task = null;
        $stmt = $this->conn->prepare("SELECT * FROM tarefas WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        if($stmt->rowCount() > 0) {
            $task = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return $task;
    }

    function deleteTask($id) {
        $stmt = $this->conn->prepare("DELETE from tarefas WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->rowCount();
    }

}