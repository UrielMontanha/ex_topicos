<?php

require_once "conexao.php";
$conexao = conectar();

$sql = "SELECT * FROM turismo";
$resultado = executarSQL($conexao, $sql);
$turismo = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
echo json_encode($turismo);