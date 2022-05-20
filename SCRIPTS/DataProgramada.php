<?php
session_start();
include "../COMPONENTS/conexao.php";
$valorMod = $_POST['valor']; 
$data = $_POST['dataProg'];
$dataProg = date("Y-m-d", strtotime($data));
$obcervacao = $_POST['Obcervacao'];

$inserir=$conexao->query("INSERT INTO ValorRetProg (id_user, data, obcervacao, valor, ativo) VALUES ('$_SESSION[id]','$dataProg', '$obcervacao', '$valorMod', '1')");

header('location: ../index.php')
?>