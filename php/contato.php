<?php

session_start();
include_once("conexao.php");


?>

<?php
    
    date_default_timezone_set ('America/Sao_Paulo');
    $email = filter_input(INPUT_POST, 'email_enviar', FILTER_SANITIZE_EMAIL);
    $mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);

    $result_usuario = "INSERT INTO msg_cliente (email, msg) VALUES ('$email', '$mensagem')";
    $insert_cli = mysqli_query($conn, $result_usuario);
    // mysqli_query realiza uma execução de algo e põe o que deve ser feito dentro dos ().
    if(mysqli_insert_id($conn)){
        $_SESSION['msg'] = "<script>alert('Sua mensagem foi enviada com sucesso!')</script>";
        header("location: ../contato.php");
    }else{
        $_SESSION['msg'] = "<script>alert('Falha ao enviar a mensagem!')</script>";
        header("location: ../contato.php");
        }

    ?>