<?php

require_once('Database.php');

header("Content-type: application/json");

$q = filter_input(INPUT_POST, "q");

if($q == "add") {
    store();
}
else if($q == "read") {
    read();
}
else if($q == "get") {
    get();
}
else if($q == "edit") {
    update();
}
else if($q == "del") {
    delete();
}

function get() {
    $id = filter_input(INPUT_POST, "id");
    $database = new Database();
    $json = $database->getTask($id);
    echo json_encode($json);
}

function read() {
    $database = new Database();
    echo json_encode($database->readTasks());
}

function store() { 
    $descricao = mb_strtoupper(trim(filter_input(INPUT_POST, "descricao")));
    $prioridade = filter_input(INPUT_POST, "prioridade");
    $concluida = filter_input(INPUT_POST, "concluida");
    $database = new Database();
    $json = $database->addTask($descricao, $prioridade, $concluida);
    echo json_encode($json);
}

function update() {
    $id = filter_input(INPUT_POST, "id");
    $descricao = mb_strtoupper(trim(filter_input(INPUT_POST, "descricao")));
    $prioridade = filter_input(INPUT_POST, "prioridade");
    $concluida = filter_input(INPUT_POST, "concluida");
    $database = new Database();
    $json = $database->updateTask($id, $descricao, $prioridade, $concluida);
    echo json_encode($json);
}

function delete() {
    $id = filter_input(INPUT_POST, "id");
    $database = new Database();
    $json = $database->deleteTask($id);
    echo json_encode($json);
}