<?php
include "../COMPONENTS/conexao.php";

$valorMod = $_POST['valor']; 
$data = $_POST['dataProg'];
$dataProg = date("Y-m-d", strtotime($data));
$obcervacao = $_POST['Obcervacao'];

$inserir=$conexao->query("INSERT INTO ValorRetProg (data, obcervacao, valor, ativo) VALUES ('$dataProg', '$obcervacao', '$valor', '1')");

header('location: ../index.php')
?>