<?php
session_start();
include "../COMPONENTS/conexao.php";

$consultaValor=$conexao->query("SELECT valor FROM ValorAtual ORDER BY id DESC");
$exibValor=$consultaValor->fetch(PDO::FETCH_ASSOC);

$vlr = $exibValor['valor'] - $_POST['valorAdd']; 
$valorMod = $_POST['valorAdd']; 
$modo = "Você Removeu Dinheiro!";
$data = date('Y-m-d');
$obcervacao = $_POST['Obcervacao'];

$inserirVlr = $conexao->query("INSERT INTO ValorAtual (id_user, valor) VALUES ('$_SESSION[id]', '$vlr')");
$inserir=$conexao->query("INSERT INTO ValorMod (id_user, valor, modo, data, obcervacao, status) VALUES ('$_SESSION[id]', '$valorMod', '$modo', '$data', '$obcervacao', '1')");

header('location: ../index.php')
?>