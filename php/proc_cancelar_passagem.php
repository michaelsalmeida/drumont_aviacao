<?php
session_start();
include_once('conexao.php');

if (!isset($_SESSION['verifica_cliente'])) {
    // Se não estiver autenticado, redireciona para a página de login
    header("Location: ../login.php");
    exit;
}

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$sql = "UPDATE passagem SET cancelado='SIM', data_cancel = NOW() WHERE pk_passagem ='$id' ORDER BY pk_passagem";
$query = mysqli_query($conn, $sql);

if (mysqli_affected_rows($conn)) {
    $_SESSION['msg'] = "<h4 style='color: green; text-align: center; '>PASSAGEM CANCELADA</h4>";
    header("Location: minhas_viagens.php");
} else {
    $_SESSION['msg'] = "<h4 style='color: red; text-align: center;'>A PASSAGEM NÃO FOI CANCELADA</h4>";
    header("Location: minhas_viagens.php");
}

?>