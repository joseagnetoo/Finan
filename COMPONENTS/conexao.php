<?php

try{

$conexao = new PDO('mysql:host=179.188.16.31;dbname=finansite;charset=utf8','finansite','Finan@123', array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES UTF8'));
$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e){

    echo 'Erro Na Conexão:'.$e->getMessage().'<br>';
    echo 'Codigo do erro:'.$e->getCode();

}

?>