<?php

    $dbHost = 'LocalHost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'cadastro-clientes';

    $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

    header('Location: index.php')
?>