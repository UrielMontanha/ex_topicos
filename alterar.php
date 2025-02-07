<?php

require_once "conexao.php";
$conexao = conectar();

$turismo = json_decode(file_get_contents("php://input"));
$sql = "UPDATE turismo SET
        nome='$turismo->nome', 
        descricao='$turismo->descricao', 
        cidade='$turismo->cidade',
        pais='$turismo->pais'
        WHERE id=$turismo->id";

executarSQL($conexao, $sql);

echo json_encode($turismo);