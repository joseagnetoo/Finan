<?php
include "../COMPONENTS/conexao.php";

$user = $_POST['user'];
$email = $_POST['email'];
$senha = $_POST['password'];

$inserir=$conexao->query("INSERT INTO usuarios (usuario, email, senha, ADM) VALUES ('$user', '$email', '$senha', '0')");

header('location: ../PAGES/login.php');
?>