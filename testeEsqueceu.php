<?php

if (isset($_POST['submit']) && !empty($_POST['email_digitado']) && !empty($_POST['redefinir_senha'])){
    include_once('config.php');

    $email_digitado = $_POST['email_digitado'];
    $redefinir_senha = $_POST['redefinir_senha'];

    $sql = "SELECT * FROM usuarios WHERE email = '$email_digitado'";
    $result = $conexao->query($sql);

    if ($result->num_rows > 0){

        $sql_update = "UPDATE usuarios SET senha = '$redefinir_senha', repetir_senha = senha WHERE email = '$email_digitado'";

        if($conexao -> query($sql_update) === TRUE){
            header('Location: index.php');
            exit;
        }
    }
}
?>
