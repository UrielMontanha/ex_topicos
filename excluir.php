<?php
$id = isset($_GET['id']) ? $_GET['id'] : 0;

require_once "conexao.php";
$conexao = conectar();

// Validar se o ID é válido (inteiro)
if (is_numeric($id) && $id > 0) {
    $id = mysqli_real_escape_string($conexao, $id);
    $sql = "DELETE FROM turismo WHERE id = $id";
    $retorno = executarSQL($conexao, $sql);
    echo json_encode($retorno);
} else {
    echo json_encode(false);  // Caso o ID não seja válido
}
?>
