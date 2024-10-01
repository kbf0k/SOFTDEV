<?php
    $dbHost = 'LocalHost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'cadastro-clientes';

    $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

    if($conexao->connect_errno){
        echo 'Erro na Conexão'. $conexao->connect_errno;
    }
    else{
        echo 'Conectado com sucesso';
    }
?>







