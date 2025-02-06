<?php

$id = $_GET['id'];

require_once "conexao.php";
$conexao = conectar();

$sql = "SELECT id, nome, descricao, cidade, pais FROM turismo 
        WHERE id = $id";
$resultado = executarSQL($conexao, $sql);
$turismo = mysqli_fetch_assoc($resultado);
echo json_encode($turismo);