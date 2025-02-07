<?php
require_once "conexao.php";
require 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;



$conexao = conectar();



// Configurar opções do DOMPDF
$options = new Options();

// Permite usar CSS e fontes externas
$options->set('isRemoteEnabled', true); 
$dompdf = new Dompdf($options);

// HTML inicial
$dados = '
<html>
<head>
<link rel="StyleSheet" type="Text/css" href="estilo.css">
<style>
body
 { font-family: Arial, sans-serif; }

table {
  border-collapse: collapse;
  width: 100%;
}

td {
  text-align: left;
  padding: 10px;
  color: black;
}

th {
  background: #01579b;
  color: white;
}

tr:nth-child(even)
	{background-color: #bdbdbd}
thead 
{
  background-color: #90a4ae;
  color: white;
}
</style>
</head>
<body>
';


$dados .= "<h1 style ='text-align: center;'> <img src='http://localhost/ex_topicos/imagens/Turismo.png' height='70px'> </h1>";
$dados .= "<h1 style ='text-align: center;'> Relatório </h1>";



$dados .="<table>
<thead>
<tr>
<th>ID</th>
<th>Nome</th>
<th>Cidade</th>
</tr>
</thead>
<tbody>";

$sql = "SELECT id,nome,cidade FROM turismo";
  $resultado = mysqli_query($conexao,$sql); 
  while($linha = mysqli_fetch_assoc($resultado))
  {
    $dados .= "<tr>";
    $dados .= '<td>' . $linha['id'] . '</td>';
    $dados .= '<td>'. $linha['nome'] . '</td>'; 
    $dados .= '<td>' . $linha['cidade'] . '</td>'; 
    $dados .= "</tr>";     
  }       
  $dados .= "</tbody>";
  $dados .= "</table>";
  $dados .= "</body> </html>";



// Carrega o HTML no DOMPDF
$dompdf->loadHtml($dados);
// Define tamanho e orientação do papel
$dompdf->setPaper('A4', 'portrait');

// Renderizar o PDF
$dompdf->render();

// Enviar o PDF para o navegador
$dompdf->stream("relatorio.pdf", ["Attachment" => true]); 
// Attachment false para exibir no navegador
?>