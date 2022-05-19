<?php
include "../COMPONENTS/conexao.php";

$consultaValor=$conexao->query("SELECT valor FROM ValorAtual ORDER BY id DESC");
$exibValor=$consultaValor->fetch(PDO::FETCH_ASSOC);

$vlr = $exibValor['valor'] - $_POST['valorAdd']; 
$valorMod = $_POST['valorAdd']; 
$modo = "Você Adicionou Dinheiro!";
$data = date('Y-m-d');
$obcervacao = $_POST['Obcervacao'];

$inserir=$conexao->query("INSERT INTO ValorMod (valor, modo, data, obcervacao, status) VALUES ('$valorMod', '$modo', '$data', '$obcervacao', '1')");

header('location: ../index.php')
?>