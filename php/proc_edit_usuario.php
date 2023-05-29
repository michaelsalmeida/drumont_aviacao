<?php
session_start();
include_once("conexao.php");
$_SESSION['verifica_cliente'];
$_SESSION['nome_cliente'];
$_SESSION['sobrenome_cliente'];
$_SESSION['cpf_cliente'];
$_SESSION['datanasci_cliente'];
//Tabela cadastro
$_SESSION['email_cliente'];
$_SESSION['senha_cliente'];
//Tabela rg
$_SESSION['rg_cliente'];
//Tabela endereco
$_SESSION['cep_cliente'];
$_SESSION['rua_cliente'];
$_SESSION['bairro_cliente'];
$_SESSION['cidade_cliente'];
$_SESSION['uf_cliente'];
//Tabela contato_cliente
$_SESSION['numero_cliente'];
$_SESSION['telefone_cliente'];
$_SESSION['celular_cliente'];

// Dados do formulário
$cep = filter_input(INPUT_POST, 'cep_cliente', FILTER_SANITIZE_STRING);
$rua = filter_input(INPUT_POST, 'rua_cliente', FILTER_SANITIZE_STRING);
$bairro = filter_input(INPUT_POST, 'bairro_cliente', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'cep_cliente', FILTER_SANITIZE_STRING);
$uf = filter_input(INPUT_POST, 'uf_cliente', FILTER_SANITIZE_STRING);
$celular = filter_input(INPUT_POST, 'celular_cliente', FILTER_SANITIZE_STRING);

$id = $_SESSION['verifica_cliente'];


$sql = "UPDATE endereco SET cep='$cep', rua='$rua', bairro='$bairro', cidade='$cidade', uf='$uf' WHERE fk_cliente='$id'";
$query = mysqli_query($conn, $sql);

if (mysqli_affected_rows($conn)) {
    $_SESSION['msg'] = "<h4 style='color: green; text-align: center; '>USUÁRIO EDITADO COM SUCESSO</h4>";
    header("Location: ../perfil.php");
} else {
    $_SESSION['msg'] = "<h4 style='color: red; text-align: center;'>USUÁRIO NÃO FOI EDITADO</h4>";
    header("Location: ../perfil.php");
}

$sql2 = "UPDATE contato_cliente SET celular='$celular' WHERE fk_cliente='$id'";
$query2 = mysqli_query($conn, $sql2);

if (mysqli_affected_rows($conn)) {

    $_SESSION['celular_cliente'] = $celular;

    $_SESSION['msg'] = "<h4 style='color: green; text-align: center; '>CELULAR EDITADO COM SUCESSO</h4>";
    header("Location: ../perfil.php");
}
?>
