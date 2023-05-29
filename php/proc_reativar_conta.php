<?php
session_start();
include_once("conexao.php");

$id = $_SESSION['verifica_cliente'];

$sql = "UPDATE cadastro SET funcionamento='1', reativado=NOW() WHERE fk_cliente='$id'";
$query = mysqli_query($conn, $sql);

if (mysqli_affected_rows($conn)) {
    $_SESSION['msg'] = "<h4 style='color: green; text-align: center; '>USUÁRIO REATIVADO COM SUCESSO</h4>";
    header("Location: ../perfil.php");
    exit;
} else {
    $_SESSION['msg'] = "<h4 style='color: red; text-align: center;'>USUÁRIO NÃO FOI REATIVADO</h4>";
    header("Location: ../login.php");
    exit;
}

?>