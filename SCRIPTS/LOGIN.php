<?php

session_start();

include "../COMPONENTS/conexao.php";

$recebe_email = $_POST['email'];
$recebe_senha = $_POST['password'];

$consulta = $conexao->query("SELECT * FROM usuarios WHERE email='$recebe_email' AND senha='$recebe_senha'");

if ($consulta->rowCount()==1){
    $exibirUser = $consulta->fetch(PDO::FETCH_ASSOC);
    if($exibirUser['adm']==0){
        $_SESSION['id'] = $exibirUser['id'];
        $_SESSION['adm']=0;
        header('location: ../index.php');
    }
}
else{
   // header('location: ./loginPageError.php');
}
?>