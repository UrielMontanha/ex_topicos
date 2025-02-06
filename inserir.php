<?php

require_once "conexao.php";
$conexao = conectar();

$turismo = json_decode(file_get_contents("php://input"));
$sql = "INSERT INTO turismo
        (nome, descricao, cidade, pais)
        VALUES 
        ('$turismo->nome', 
        '$turismo->descricao', 
        '$turismo->cidade', 
        '$turismo->pais')";

executarSQL($conexao, $sql);

$turismo->id = mysqli_insert_id($conexao);
echo json_encode($turismo);