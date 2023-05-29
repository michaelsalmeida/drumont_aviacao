<?php
session_start();
include_once("conexao.php");

$id = $_SESSION['verifica_cliente'];

$sql = "UPDATE cadastro SET funcionamento='0', desativado=NOW() WHERE fk_cliente='$id'";
$query = mysqli_query($conn, $sql);

if (mysqli_affected_rows($conn)) {
    $_SESSION['msg'] = "<h4 style='color: green; text-align: center; '>USUÁRIO DESATIVADO COM SUCESSO</h4>";
    header("Location: ../login.php");
    exit;
} else {
    $_SESSION['msg'] = "<h4 style='color: red; text-align: center;'>USUÁRIO NÃO FOI DESATIVADO</h4>";
    header("Location: ../perfil.php");
    exit;
}

?>