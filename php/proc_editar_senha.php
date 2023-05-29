<?php
session_start();
include_once("conexao.php");

$_SESSION['senha_cliente'];


$senha = filter_input(INPUT_POST, 'senha_cliente', FILTER_SANITIZE_STRING);
$id = $_SESSION['verifica_cliente'];

$sql = "UPDATE cadastro SET senha='$senha', modificado=NOW() WHERE fk_cliente='$id'";
$query = mysqli_query($conn, $sql);

if (mysqli_affected_rows($conn)){
    $_SESSION['msg'] = "<h4 style='color: green; text-align: center; '>SENHA EDITADA COM SUCESSO</h4>";
    header("Location: ../perfil.php");
} else {
    $_SESSION['msg'] = "<h4 style='color: red; text-align: center;'>SENHA NÃO FOI EDITADA</h4>";
    header("Location: ../perfil.php");
}

?>